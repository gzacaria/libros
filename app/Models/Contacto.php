<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table="contactos";
    public function persona()
    {
    	return $this->belongsTo("App\Models\Persona");
    }
}
