<?php

namespace App\Repositories;

use App\Models\clausula;
use InfyOm\Generator\Common\BaseRepository;

class clausulaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'clausulas'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return clausula::class;
    }
}
