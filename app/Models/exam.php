<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\opeside ;
use App\Models\qustion ;
use App\Models\degre ;
class exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'descrption',
        'time',
        'opeside_id',
    ];
    public function opeside(): BelongsTo
    {
        return $this->BelongsTo(opeside::class);
    }
    public function qustion(): HasMany
    {
        return $this->HasMany(qustion::class);
    }
    public function degre(): HasMany
    {
        return $this->HasMany(degre::class);
    }
}
