<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class file extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'url',
        'name',
        'fileable_type',
        'fileable_id',
    ];
    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }
}
