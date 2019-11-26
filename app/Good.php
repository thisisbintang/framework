<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'goods';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['itemCode', 'brand', 'color', 'size', 'price'];

    /**
     * Get the stocks for the goods.
     */
    public function stocks()
    {
        return $this->hasMany('App\Stock', 'itemCode');
    }

}
