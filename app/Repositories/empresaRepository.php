<?php

namespace App\Repositories;

use App\Models\empresa;
use InfyOm\Generator\Common\BaseRepository;

class empresaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'municipio_id',
        'contrato_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return empresa::class;
    }
}
