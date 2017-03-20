<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="municipio",
 *      required={"municipio", "estado_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="municipio",
 *          description="municipio",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="estado_id",
 *          description="estado_id",
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
class municipio extends Model
{
    use SoftDeletes;

    public $table = 'municipios';
    

    protected $dates = ['deleted_at'];

    //BelongsTo----------------------------------
    public function estado()
    {
        return $this->BelongsTo('App\Models\estado');
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

    public $fillable = [
        'municipio',
        'estado_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'municipio' => 'string',
        'estado_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'municipio' => 'required',
        'estado_id' => 'required'
    ];
}
