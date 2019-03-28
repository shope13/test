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
        \App\Worker::create(
            array(
                'name' => 'John',
                'post' => 'Boss',
                'd_of_emp' => '2011-11-11',
                'salary' => 11

                ));
    }
}
