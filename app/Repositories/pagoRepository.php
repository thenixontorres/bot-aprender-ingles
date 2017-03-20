<?php

namespace App\Repositories;

use App\Models\pago;
use InfyOm\Generator\Common\BaseRepository;

class pagoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'monto',
        'numero_cuota',
        'tipo_pago',
        'contrato_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pago::class;
    }
}
