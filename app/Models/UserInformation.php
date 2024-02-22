<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;
    protected $table = 'user_informations';
    protected $fillable =[
        'first name',
        'middle name',
        'last name',
        'age',
        'gender',
        'date of birth',
        'phone number',
        'address',
        'city',
        'zip code',
        'province',
        'email',
        'password',
        'created at',
        'updated at',
    ];
}