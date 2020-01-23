<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model 
{
    use SoftDeletes;
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
    
}
