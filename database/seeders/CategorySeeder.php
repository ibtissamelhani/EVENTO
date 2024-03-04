<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
        
                    'Fashion shows',
                    'Hackathons',
                    'Tech conferences',
                    'Religious festivals',
                    'Holiday celebrations',
                    'Olympic Games' , 
                    'Charity sports',
                    'championships' ,
                    ' book launches',
                    'Dance recitals' ,
                    'festival' ,
                    'Theater performances' ,
                    'gallery' ,
                    'Award ceremonies' ,
                    'Workshops' ,
                    'Conferences'

    
        ];

        foreach ($categories as $category){
            Category::create(['name' => $category]);
        }
    }
}
