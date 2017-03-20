<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="planes",
 *      required={"plan", "monto", "informacion"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="plan",
 *          description="plan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="monto",
 *          description="monto",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="informacion",
 *          description="informacion",
 *          type="string"
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
class planes extends Model
{
    use SoftDeletes;

    public $table = 'planes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'plan',
        'monto',
        'informacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'plan' => 'string',
        'monto' => 'string',
        'informacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'plan' => 'required',
        'monto' => 'required',
        'informacion' => 'required'
    ];
}
