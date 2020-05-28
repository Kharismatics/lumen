<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model 
{
    use SoftDeletes;
    
    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ]; 
    protected $fillable = [
        'id',
    ];
    
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
