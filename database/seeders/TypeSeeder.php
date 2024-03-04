<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Sports Organizations',
            ],
            [
                'name' => 'Cultural Institutions',
            ],
            [
                'name' => 'Event Venues',
            ],
            [
                'name' => 'Government Bodies',
            ],
            [
                'name' => 'Educational Institutions',
            ], 
            [
                'name' => 'Nonprofit Organizations',
            ],
            ];
            foreach ($types as $type){
                Type::create($type);
            }
    }
}
