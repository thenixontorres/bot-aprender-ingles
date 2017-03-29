<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="pago",
 *      required={"monto", "numero_cuota", "tipo_pago", "contrato_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="monto",
 *          description="monto",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="numero_cuota",
 *          description="numero_cuota",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipo_pago",
 *          description="tipo_pago",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contrato_id",
 *          description="contrato_id",
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
class pago extends Model
{
    use SoftDeletes;

    public $table = 'pagos';
    

    protected $dates = ['deleted_at'];

    //BelongsTo----------------------------------
    public function contrato()
    {
        return $this->BelongsTo('App\Models\contrato');
    }

    public $fillable = [
        'monto',
        'numero_cuota',
        'tipo_pago',
        'contrato_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'monto' => 'string',
        'numero_cuota' => 'string',
        'tipo_pago' => 'string',
        'contrato_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'monto' => 'required',
        'numero_cuota' => 'required',
        'tipo_pago' => 'required',
        'contrato_id' => 'required'
    ];
}
