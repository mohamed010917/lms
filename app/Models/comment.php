<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User ;
use App\Models\opeside ;
class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'opeside_id',
        'comment',
    ];
    public function user():BelongsTo
    {
        return $this->BelongsTo(User::class) ;
    }
    public function opeside(): BelongsTo
    {
        return $this->BelongsTo(opeside::class);
    }
}


