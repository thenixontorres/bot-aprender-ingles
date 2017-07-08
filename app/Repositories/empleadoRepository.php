<?php

namespace App\Repositories;

use App\Models\empleado;
use InfyOm\Generator\Common\BaseRepository;

class empleadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return empleado::class;
    }
}
