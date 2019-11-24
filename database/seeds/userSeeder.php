<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // manualmente individualmente
      DB::table('users')->insert([
           'name' => 'carlos prato',
           'email' => 'carlos@gmail.com',
           'password' => bcrypt('123456'),
           'edad' => '27',
           'role' => '3',
           'created_at' => '2019-11-23 18:00:07',
       ]);

       DB::table('users')->insert([
            'name' => 'rodolfo',
            'email' => 'rodolfo@gmail.com',
            'password' => bcrypt('123456'),
            'edad' => '35',
            'role' => '2',
            'created_at' => '2019-11-24 18:00:07',
        ]);

        DB::table('users')->insert([
             'name' => 'maria',
             'email' => 'maria@gmail.com',
             'password' => bcrypt('123456'),
             'edad' => '16',
             'role' => '1',
             'created_at' => '2019-11-25 18:00:07',
         ]);

         DB::table('users')->insert([
              'name' => 'pedro',
              'email' => 'pedro@gmail.com',
              'password' => bcrypt('123456'),
              'edad' => '30',
              'role' => '1',
              'created_at' => '2019-11-26 18:00:07',
          ]);

    }
}
