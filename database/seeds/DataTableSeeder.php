<?php

use Illuminate\Database\Seeder;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_data')->insert([
            [
                'first_name' => 'متینه',
                'last_name' => 'نعمت بخش',
                'email' => 'nematbakhsh78@gmail.com',
                'password' => 'q1111',
            ],
            [
                'first_name' => 'علی',
                'last_name' => 'زارع',
                'email' => 'alizare@gmail.com',
                'password' => 'a1111',
            ],
            [
                'first_name' => 'زهرا',
                'last_name' => 'علیخانی',
                'email' => 'zahraalikhani@gmail.com',
                'password' => 'z1111',
            ],
        ]);

    }
}
