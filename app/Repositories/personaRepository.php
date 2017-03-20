<?php

namespace App\Repositories;

use App\Models\persona;
use InfyOm\Generator\Common\BaseRepository;

class personaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido',
        'cedula',
        'sexo',
        'fecha_nac',
        'municipio_id',
        'direccion',
        'contrato',
        'tipo_contrato'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return persona::class;
    }
}
