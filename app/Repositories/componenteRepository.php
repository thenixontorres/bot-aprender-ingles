<?php

namespace App\Repositories;

use App\Models\componente;
use InfyOm\Generator\Common\BaseRepository;

class componenteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'componete',
        'plan_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return componente::class;
    }
}
