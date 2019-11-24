<?php

use Illuminate\Database\Seeder;

class projectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('projects')->insert([
           'title' => 'mi primer proyecto',
           'description' => 'el primer proyecto con laravel, esta es mi descripcion',
           'created_at' => '2019-11-24 18:00:07',
           'url' => 'laurl.com-primer',
           'updated_at' => '2019-12-26 18:00:07',
       ]);
       DB::table('projects')->insert([
            'title' => 'mi segundo proyecto',
            'description' => 'el segundo proyecto con laravel, esta es mi descripcion',
            'created_at' => '2019-11-25 18:00:07',
            'url' => 'laurl.com-segundo',
            'updated_at' => '2019-12-26 18:00:07',
        ]);
        DB::table('projects')->insert([
             'title' => 'mi tercer proyecto',
             'description' => 'el tercer proyecto con laravel, esta es mi descripcion',
             'created_at' => '2019-11-26 18:00:07',
             'url' => 'laurl.com-tercer',
             'updated_at' => '2019-12-26 18:00:07',
         ]);
         DB::table('projects')->insert([
              'title' => 'mi cuarto proyecto',
              'description' => 'el cuarto proyecto con laravel, esta es mi descripcion',
              'created_at' => '2019-11-27 18:00:07',
              'url' => 'laurl.com-cuarto',
              'updated_at' => '2019-12-26 18:00:07',
          ]);
    }
}
