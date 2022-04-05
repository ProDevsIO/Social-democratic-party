<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
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

    public function payment()
    {
       return $this->HasOne(ApplicationPayment::class, 'application_id', 'id');
    }

    public function form()
    {
       return $this->HasOne(Form::class , 'id', 'form_id');
    }

    public function category()
    {
       return $this->HasOne(Categories::class, 'id', 'category_id');
    }

    public function position()
    {
       return $this->HasOne(Position::class, 'id', 'position_id');
    }

    public function Document()
    {
       return $this->hasMany(ApplicationDocument::class, 'application_id','id' );
    }
   
}
