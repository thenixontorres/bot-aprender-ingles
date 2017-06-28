<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ruta",
 *      required={"direccion"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="direccion",
 *          description="direccion",
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
class ruta extends Model
{
    use SoftDeletes;

    public $table = 'rutas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'direccion',
        'empleado_id',
    ];

    //hasMany----------------------------------
    public function contratos()
    {
        return $this->hasMany('App\Models\contrato');
    }

    //belongsTo
    public function empleado()
    {
        return $this->belongsTo('App\Models\empleado');
    }
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'direccion' => 'required',
        'empleado_id' => 'required',
    ];
}
