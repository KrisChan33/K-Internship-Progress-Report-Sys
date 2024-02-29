<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userinformations extends Model

{
protected $table ='userinformation';

    use HasFactory;
    protected $fillable = [
        'user_id', // Add this line
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
        'role',
    ];

    public function userinformations()
    {
        return $this->belongsTo(User::class);
    }
}