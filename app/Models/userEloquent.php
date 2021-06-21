<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userEloquent extends Model
{
    use HasFactory;
    protected $table= 'users';

    protected $fillable = ['name', 'email', 'password','rol_id'];

    public function getRol()
    {
                            // Modelo de referencia, campo local, campo foráneo 
        return $this->belongsTo('App\Models\Roles','rol_id','id');
    }
}
