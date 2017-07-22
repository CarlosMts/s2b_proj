<?php

use Illuminate\Database\Seeder;

class SpaceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
       {
         //delete users table records
         DB::table('space_types')->delete();
         //insert some dummy records
         DB::table('space_types')->insert(array(
             array('name'=>'Coworking','short_name'=>'Coworking'),
             array('name'=>'Escritório','short_name'=>'Escritório'),
             array('name'=>'Sala de Formação','short_name'=>'Sala Formação'),
             array('name'=>'Sala de Reunião Grande','short_name'=>'Reunião Grande'),
             array('name'=>'Sala de Reunião Pequena','short_name'=>'Reunião Pequena'),
             array('name'=>'Auditório','short_name'=>'Auditório'),
          ));
       }
}
