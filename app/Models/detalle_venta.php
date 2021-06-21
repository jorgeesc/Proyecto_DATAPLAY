<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_venta extends Model
{
    use HasFactory;

    protected $table = 'detalle_venta';
    protected $fillable = ['precio', 'cantidad', 'juegos_id', 'venta_id','user_id'];


        public function getJuegos()
    {
                            // Modelo de referencia, campo local, campo foráneo 
        return $this->belongsTo('App\Models\Juegos','juegos_id','id');
    }

     public function getVenta()
    {
                            // Modelo de referencia, campo local, campo foráneo 
        return $this->belongsTo('App\Models\Venta','venta_id','id');
    }

     
}
