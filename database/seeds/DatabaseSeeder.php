<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // $this->call(UsersTableSeeder::class);
        $quantity_type = ['Kg','Litre','Dozen','piece'];
        $volume = [/*kg=*/'1',/*Litre=*/'1',/*Dozen=*/'12',/*piece=*/'1'];
        for ($i=0; $i < 4; $i++) { 
            DB::table('quantity_type')->insert([
                'quantity_type' => $quantity_type[$i],
                'volume' => $volume[$i]
            ]);
        }
    }
}
