<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPosition extends Model
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
        'positon_id',
        'fee'
     ];

     public function form()
     {
        return $this->belongsTo(Form::class);
     }

     public function category()
     {
        return $this->belongsTo(Categories::class, 'id');
     }

     public function position()
     {
        return $this->belongsTo(Position::class,'positon_id', 'id',);
     }

     
}
