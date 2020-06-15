<?php

use Illuminate\Database\Seeder;
 class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'мобильные телефоны',
                'code' => 'mobiles',
                'description' => 'description of mobiles',

            ],
             [
                'name' => 'Портативная техника',
                'code' => 'portable',
                'description' => 'description of portable',
                
            ],
            [
                'name' => 'Холодильники',
                'code' => 'technics',
                'description' => 'description of technics',
                
            ],
        ]);
    }
}
