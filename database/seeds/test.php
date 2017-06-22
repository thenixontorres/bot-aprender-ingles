<?php

use Illuminate\Database\Seeder;

class test extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'master',
            'email'     => 'master@example.com',
            'password'  => bcrypt('master@example.com'),
            'telefono' => '0000-000-0000',
            'cedula' => '00000000',
            'apellido' => 'master',
            'nombre' => 'master',
            'tipo' => 'master'
        ]);

        DB::table('users')->insert([
        	'username' => 'admin',
            'email'     => 'admin@example.com',
        	'password' 	=> bcrypt('admin@example.com'),
            'telefono' => '0000-000-0000',
            'cedula' => '00000001',
            'apellido' => 'admin',
            'nombre' => 'admin',
            'tipo' => 'admin'
        ]);
    }
}
