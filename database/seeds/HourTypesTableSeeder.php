<?php

use Illuminate\Database\Seeder;

class HourTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
       {
         //delete users table records
         DB::table('hour_types')->delete();
         //insert some dummy records
         DB::table('hour_types')->insert(array(
             array('type'=>'1h'),
             array('type'=>'4h'),
             array('type'=>'8h'),
             array('type'=>'month'),
          ));
       }
}
