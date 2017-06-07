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
        	'username' => 'test',
            'email'     => 'admin@example.com',
        	'password' 	=> bcrypt('admin'),
            'telefono' => '0000-000-0000',
            'cedula' => '00000000',
            'apellido' => 'admin',
            'nombre' => 'admin',
            'tipo' => 'admin'
        ]);
    }
}
