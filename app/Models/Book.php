<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // protects your model from mass assignment , only the fields you put in the fillable are fillable
    protected $table = 'books';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'genre',
        'status',
        'loan_date',
        'loan_due'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
