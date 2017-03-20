<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="contrato",
 *      required={"fecha_inicio", "tipo_contrato", "clausula_id", "plan_id", "tiempo_pago"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fecha_inicio",
 *          description="fecha_inicio",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipo_contrato",
 *          description="tipo_contrato",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="clausula_id",
 *          description="clausula_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="plan_id",
 *          description="plan_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tiempo_pago",
 *          description="tiempo_pago",
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
class contrato extends Model
{
    use SoftDeletes;

    public $table = 'contratos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecha_inicio',
        'tipo_contrato',
        'clausula_id',
        'plan_id',
        'tiempo_pago'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha_inicio' => 'string',
        'tipo_contrato' => 'string',
        'clausula_id' => 'integer',
        'plan_id' => 'integer',
        'tiempo_pago' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_inicio' => 'required',
        'tipo_contrato' => 'required',
        'clausula_id' => 'required',
        'plan_id' => 'required',
        'tiempo_pago' => 'required'
    ];
}
