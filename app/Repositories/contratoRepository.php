<?php

namespace App\Repositories;

use App\Models\contrato;
use InfyOm\Generator\Common\BaseRepository;

class contratoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha_inicio',
        'tipo_contrato',
        'clausula_id',
        'plan_id',
        'tiempo_pago'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return contrato::class;
    }
}
