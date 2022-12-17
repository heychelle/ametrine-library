<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'magazines';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'status',
        'loan_date',
        'loan_due'
    ];

    public function reviews(){
        return $this->morphMany(User::class, 'reviewable');
    }
}
