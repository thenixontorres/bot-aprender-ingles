<?php

namespace App\Repositories;

use App\Models\ruta;
use InfyOm\Generator\Common\BaseRepository;

class rutaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'direccion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ruta::class;
    }
}
