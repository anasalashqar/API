<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cars')->insert([
            [
                'make' => 'Toyota',
                'model' => 'Corolla',
                'year' => 2020,
                'color' => 'White',
                'transmission' => 'Automatic',
                'fuel_type' => 'Petrol',
                'mileage' => 35000,
                'price' => 15000.00,
                'description' => 'Reliable sedan with excellent fuel efficiency.',
                'image_url' => 'https://example.com/images/toyota-corolla.jpg',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'make' => 'Ford',
                'model' => 'Mustang',
                'year' => 2018,
                'color' => 'Red',
                'transmission' => 'Manual',
                'fuel_type' => 'Petrol',
                'mileage' => 42000,
                'price' => 27000.00,
                'description' => 'Powerful muscle car with V8 engine.',
                'image_url' => 'https://example.com/images/ford-mustang.jpg',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'make' => 'Tesla',
                'model' => 'Model 3',
                'year' => 2022,
                'color' => 'Black',
                'transmission' => 'Automatic',
                'fuel_type' => 'Electric',
                'mileage' => 10000,
                'price' => 40000.00,
                'description' => 'Fully electric car with autopilot features.',
                'image_url' => 'https://example.com/images/tesla-model3.jpg',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'make' => 'Honda',
                'model' => 'Civic',
                'year' => 2019,
                'color' => 'Silver',
                'transmission' => 'Automatic',
                'fuel_type' => 'Petrol',
                'mileage' => 29000,
                'price' => 17000.00,
                'description' => 'Sporty compact with great handling.',
                'image_url' => 'https://example.com/images/honda-civic.jpg',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'make' => 'BMW',
                'model' => 'X5',
                'year' => 2021,
                'color' => 'Blue',
                'transmission' => 'Automatic',
                'fuel_type' => 'Diesel',
                'mileage' => 22000,
                'price' => 52000.00,
                'description' => 'Luxury SUV with advanced features.',
                'image_url' => 'https://example.com/images/bmw-x5.jpg',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
