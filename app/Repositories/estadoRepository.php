<?php

namespace App\Repositories;

use App\Models\estado;
use InfyOm\Generator\Common\BaseRepository;

class estadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return estado::class;
    }
}
