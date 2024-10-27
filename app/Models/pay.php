<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User ;

class pay extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pay',
        'time',
    ];
    public function user():BelongsTo
    {
        return $this->BelongsTo(User::class) ;
    }
}


