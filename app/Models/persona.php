<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="persona",
 *      required={"nombre", "apellido", "cedula", "sexo", "fecha_nac", "municipio_id", "direccion", "contrato", "tipo_contrato"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="apellido",
 *          description="apellido",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cedula",
 *          description="cedula",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sexo",
 *          description="sexo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fecha_nac",
 *          description="fecha_nac",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="municipio_id",
 *          description="municipio_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="direccion",
 *          description="direccion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipo_contrato",
 *          description="tipo_contrato",
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
class persona extends Model
{
    use SoftDeletes;

    public $table = 'personas';
    

    protected $dates = ['deleted_at'];

    //BelongsTo----------------------------------
    public function contrato()
    {
        return $this->BelongsTo('App\Models\contrato');
    }

    public function municipio()
    {
        return $this->BelongsTo('App\Models\municipio');
    }

    public $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'sexo',
        'fecha_nac',
        'municipio_id',
        'direccion',
        'contrato',
        'tipo_contrato'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'apellido' => 'string',
        'cedula' => 'string',
        'sexo' => 'string',
        'fecha_nac' => 'string',
        'municipio_id' => 'integer',
        'direccion' => 'string',
        'tipo_contrato' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'cedula' => 'required',
        'sexo' => 'required',
        'fecha_nac' => 'required',
        'municipio_id' => 'required',
        'direccion' => 'required',
        'contrato' => 'required',
        'tipo_contrato' => 'required'
    ];
}
