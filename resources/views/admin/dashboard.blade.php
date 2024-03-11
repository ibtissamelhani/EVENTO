<x-app-layout>
    <x-sidebar-admin>
        <div class="grid grid-cols-3 gap-4 mb-4">
            <article class="flex items-end justify-between rounded-lg border border-gray-100 bg-white p-6">
                <div>
                    <p class="text-sm text-gray-500">Total Events in Evento</p>

                    <p class="text-2xl font-medium text-gray-900">{{ $totalEvents }}</p>
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
                    <p class="text-sm text-gray-500">Total Users in Evento</p>

                    <p class="text-2xl font-medium text-gray-900">{{ $usersCount }}</p>
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
                    <p class="text-sm text-gray-500">Total Event Organizers in Evento</p>

                    <p class="text-2xl font-medium text-gray-900">{{ $organizersCount }}</p>
                </div>

                <div class="inline-flex gap-2 rounded bg-green-100 p-1 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
            </article>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="flex items-center justify-center rounded bg-gray-50 h-56 dark:bg-gray-800">
                <canvas id="automaticAcceptanceChart" class="w-32 h-32"></canvas>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-56 dark:bg-gray-800">
                <canvas id="eventCountsChart" class="w-32 h-32"></canvas>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-56 dark:bg-gray-800">
                <canvas id="userCountsChart" class="w-32 h-32"></canvas>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>

        </div>
    </x-sidebar-admin>
    <script>
        var ctx = document.getElementById('userCountsChart').getContext('2d');
        var eventCountsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['banned users', 'Unbanned users'],
                datasets: [{
                    label: 'Number of Events',
                    data: [{{ $bannedCount }}, {{ $allowedCount }}],
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
                        'rgba(238, 130, 238, 0.2)',
                        'rgba(0, 0, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(238, 130, 238, 1)',
                        'rgba(0, 0, 255, 1)'
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
    <script>
        var ctx = document.getElementById('eventCountsChart').getContext('2d');
        var eventCountsChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Published Events', 'Unpublished Events'],
                datasets: [{
                    label: 'Number of Events',
                    data: [{{ $publishedCount }}, {{ $unpublishedCount }}],
                    backgroundColor: [
                        'rgba(75, 192, 0, 0.2)',
                        'rgba(255, 0, 54, 0.2)'
                         
                    ],
                    borderColor: [
                        'rgba(75, 192, 0, 1)',
                        'rgba(255, 0, 54, 1)'
                        
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
</x-app-layout>
