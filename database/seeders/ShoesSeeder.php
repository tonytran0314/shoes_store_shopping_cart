<?php

namespace Database\Seeders;

use App\Models\Shoe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ShoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shoe::truncate();
  
        $json = File::get("database/data/shoes.json");
        $shoes = json_decode($json);
  
        foreach ($shoes as $key => $value) {
            Shoe::create([
                "image" => $value->image,
                "name" => $value->name,
                "description" => $value->description,
                "price" => $value->price,
                "color" => $value->color
            ]);
        }
    }
}
