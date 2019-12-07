<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Caffeinated\Shinobi\Models\Role;


class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      factory(App\User::class,10)->create();

      //Debe haber un ROL ADMIN POR DEFECTO.
      //Crear ROL con Acceso completo  PAra empezar.
       Role::create([
         'name' => 'Admin',
         'slug' => 'admin',
         'special' => 'all-access',
       ]);

      // manualmente
      DB::table('users')->insert([
           'name' => 'carlos prato',
           'email' => 'carlos@gmail.com',
           'password' => bcrypt('123456'),
           'edad' => '27',
           'role' => '3',
           'created_at' => '2019-11-23 18:00:07',
       ]);

        DB::table('users')->insert([
             'name' => 'maria',
             'email' => 'maria@gmail.com',
             'password' => bcrypt('123456'),
             'edad' => '16',
             'role' => '1',
             'created_at' => '2019-11-25 18:00:07',
         ]);


    }
}
