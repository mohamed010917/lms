<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User ;
class proplem extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'titel',
    ];
    public function user():BelongsTo
    {
        return $this->BelongsTo(User::class) ;
    }
}
