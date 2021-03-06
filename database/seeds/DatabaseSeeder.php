<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //call uses table seeder class
  		$this->call('SpaceTypeTableSeeder');
        $this->call('HourTypesTableSeeder');
        //this message shown in your terminal after running db:seed command
        $this->command->info("Users table seeded :)");
       
    }
}
