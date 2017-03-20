<?php

namespace App\Repositories;

use App\Models\modificacion;
use InfyOm\Generator\Common\BaseRepository;

class modificacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_contrato',
        'observacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return modificacion::class;
    }
}
