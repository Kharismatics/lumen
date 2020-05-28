<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Category extends Model 
{
    use SoftDeletes;

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function boot()
    {
       parent::boot();
       static::creating(function($model) { $user = Auth::user(); $model->created_by = $user->id; });
       static::updating(function($model) { $user = Auth::user(); $model->updated_by = $user->id; });
    }
    
    public function products()
    {
        return $this->hasMany('App\Product');
    } 
}
