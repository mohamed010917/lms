<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;
    protected $fillable = [
        "phone" , "logo",  "icone" , "prandname",  "amout" , "years",  "facebook" , "watsapp",  "linkedin" , "email",
    ];
}
