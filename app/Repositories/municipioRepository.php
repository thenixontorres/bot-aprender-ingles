<?php

namespace App\Repositories;

use App\Models\municipio;
use InfyOm\Generator\Common\BaseRepository;

class municipioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'municipio',
        'estado_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return municipio::class;
    }
}
