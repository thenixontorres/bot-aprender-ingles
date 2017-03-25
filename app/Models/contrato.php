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

    //BelongsTo----------------------------------
    public function clausula()
    {
        return $this->BelongsTo('App\Models\clausula');
    }
    
    public function plan()
    {
        return $this->BelongsTo('App\Models\planes');
    }

    //hasMany----------------------------------
    public function personas()
    {
        return $this->hasMany('App\Models\persona');
    }

    public function empresas()
    {
        return $this->hasMany('App\Models\empresa');
    }

    public function pagos()
    {
        return $this->hasMany('App\Models\pago');
    }

    public function modificacions()
    {
        return $this->hasMany('App\Models\modificacion');
    }

    public $fillable = [
        'numero',
        'fecha_inicio',
        'fecha_vencimiento',
        'tipo_contrato',
        'clausula_id',
        'plan_id',
        'monto_total',
        'monto_inicial',
        'tiempo_pago',
        'estado',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'numero' => 'string',
        'fecha_inicio' => 'string',
        'fecha_vencimiento' => 'string',
        'tipo_contrato' => 'string',
        'clausula_id' => 'integer',
        'plan_id' => 'integer',
        'monto_total' => 'string',
        'monto_inicial' => 'string',
        'tiempo_pago' => 'string',
        'estado' => 'string',
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
        'tiempo_pago' => 'required',
        'estado' => 'required'
    ];
}
