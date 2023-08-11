<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('submenus')->insert([
            ['name' => 'Submenu 1A', 'menu_id' => 1],
            ['name' => 'Submenu 1B', 'menu_id' => 1],
            ['name' => 'Submenu 2A', 'menu_id' => 2],
            ['name' => 'Submenu 3A', 'menu_id' => 3],
        ]);
    }
}
