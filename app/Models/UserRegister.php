<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_number' , 
        'person_name' , 
        'date_of_birth' , 
        'contact_number' , 
        'age' , 
        'address' , 
        'religion' , 
        'nationality',
        'image_path'
    ];
}
