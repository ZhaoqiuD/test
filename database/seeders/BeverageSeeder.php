<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Beverage;

class BeverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beverage::truncate();
        $csvFile = fopen(base_path("database/data/beverages.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Beverage::create([
                    "Name" => $data[1],
                    "Type" => $data[2],
                    "MainIngredient" => $data[3],
                    "Origin" => $data[4],
                    "CaloriesPerServing" => $data[5]
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
