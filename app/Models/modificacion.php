<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="modificacion",
 *      required={"id_contrato", "observacion"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_contrato",
 *          description="id_contrato",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="observacion",
 *          description="observacion",
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
class modificacion extends Model
{
    use SoftDeletes;

    public $table = 'modificacions';
    
    //BelongsTo----------------------------------
    public function contrato()
    {
        return $this->BelongsTo('App\Models\contrato');
    }

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_contrato',
        'observacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_contrato' => 'integer',
        'observacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_contrato' => 'required',
        'observacion' => 'required'
    ];
}
