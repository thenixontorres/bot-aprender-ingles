<?php

namespace App\Repositories;

use App\Models\planes;
use InfyOm\Generator\Common\BaseRepository;

class planesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'plan',
        'monto',
        'informacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return planes::class;
    }
}
