<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'categories';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'name',
        'description',
    ];

    // Define relationships if needed (e.g., events)
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
