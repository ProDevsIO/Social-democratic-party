<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'form_id',
        'category_id',
        'position_id',
        'first_name',
        'last_name',
        'email',
        'phone_no',
        'date_of_birth',
        'reference',
        'payment_type',
        'status'
    ];
   
}
