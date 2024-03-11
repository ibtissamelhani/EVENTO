<x-sidebar-org>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <article class="flex items-end justify-between rounded-lg border border-gray-100 bg-white p-6">
            <div>
                <p class="text-sm text-gray-500">Total Events</p>

                <p class="text-2xl font-medium text-gray-900">{{ $eventsCount }}</p>
            </div>

            <div class="inline-flex gap-2 rounded bg-green-100 p-1 text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
            </div>
        </article>
        <article class="flex items-end justify-between rounded-lg border border-gray-100 bg-white p-6">
            <div>
                <p class="text-sm text-gray-500">Requests</p>

                <p class="text-2xl font-medium text-gray-900">{{ $eventUserCount }}</p>
            </div>

            <div class="inline-flex gap-2 rounded bg-yellow-100 p-1 text-yellow-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>

                <span class="text-xs font-medium"> Pending Requests </span>
            </div>
        </article>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="flex items-center justify-center rounded bg-gray-50  dark:bg-gray-800">
            <canvas id="eventCountsChart" class="w-32 h-32"></canvas>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50  dark:bg-gray-800">
            <canvas id="automaticAcceptanceChart" class="w-32 h-32"></canvas>
        </div>
    </div>
    <script>
        var ctx = document.getElementById('eventCountsChart').getContext('2d');
        var eventCountsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Published Events', 'Unpublished Events'],
                datasets: [{
                    label: 'Number of Events',
                    data: [{{ $publishedCount }}, {{ $unpublishedCount }}],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('automaticAcceptanceChart').getContext('2d');
        var automaticCount = {{ $automaticCount }};
        var manualCount = {{ $manualCount }};

        var automaticAcceptanceChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Automatic Acceptance', 'Manual Acceptance'],
                datasets: [{
                    data: [automaticCount, manualCount],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(128, 0, 128, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(128, 0, 128, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        });
    </script>
</x-sidebar-org>
