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
        	'email'     => 'admin@example.com',
        	'password' 	=> bcrypt('admin'),
        ]);

        DB::table('estados')->insert([
            'estado'     => 'Miranda',
        ]);

        DB::table('municipios')->insert([
            'municipio'     => 'Independencia',
            'estado_id'  => '1',
        ]);
       

        DB::table('planes')->insert([
            'plan'     => 'Oro',
            'monto'  => '3000',
            'informacion'  => 'Descripcion del plan',
        ]);

        DB::table('planes')->insert([
            'plan'     => 'Plata',
            'monto'  => '2000',
            'informacion'  => 'Descripcion del plan',
        ]);

        DB::table('planes')->insert([
            'plan'     => 'Bronce',
            'monto'  => '1000',
            'informacion'  => 'Descripcion del plan',
        ]);

         DB::table('componentes')->insert([
            'componente'     => 'Servicio Funerario',
            'planes_id'  => '1',
        ]); 

        DB::table('componentes')->insert([
            'componente'     => 'Traslado Local',
            'planes_id'  => '1',
        ]);  

        DB::table('componentes')->insert([
            'componente'     => 'Servicio Funerario',
            'planes_id'  => '2',
        ]); 

        DB::table('componentes')->insert([
            'componente'     => 'Traslado Local',
            'planes_id'  => '2',
        ]);         

        DB::table('componentes')->insert([
            'componente'     => 'Servicio Funerario',
            'planes_id'  => '3',
        ]); 

        DB::table('componentes')->insert([
            'componente'     => 'Traslado Local',
            'planes_id'  => '3',
        ]);  

        DB::table('clausulas')->insert([
            'nombre'     => 'Clausular estandar',
            'clausulas'  => '/clausulas/estandar.pdf',
        ]);
    }
}
