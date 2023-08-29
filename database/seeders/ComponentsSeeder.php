<?php

namespace Database\Seeders;

use App\Models\Component;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $components = [
            ['name' => 'Blade'],
            ['name' => 'HUB'],
            ['name' => 'Generator'],
            ['name' => 'Rotor']
        ];

        Component::insert($components);
    }
}
