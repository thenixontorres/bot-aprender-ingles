<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="componente",
 *      required={"componete", "plan_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="componete",
 *          description="componete",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="plan_id",
 *          description="plan_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class componente extends Model
{
    use SoftDeletes;

    public $table = 'componentes';
    

    //BelongsTo----------------------------------
    public function contrato()
    {
        return $this->BelongsTo('App\Models\contrato');
    }

    protected $dates = ['deleted_at'];


    public $fillable = [
        'componente',
        'planes_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'componente' => 'string',
        'planes_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'componente' => 'required',
        'planes_id' => 'required'
    ];
}
