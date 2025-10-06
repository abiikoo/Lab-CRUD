<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden asignar de forma masiva.
     */
    protected $fillable = ['name', 'description', 'price', 'stock'];

    /**
     * Desactiva los timestamps (created_at y updated_at).
     */
    public $timestamps = false;
}
