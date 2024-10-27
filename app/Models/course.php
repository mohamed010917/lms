<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\file ;
use App\Models\opeside ;
use App\Models\User ;
class course extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ["name" , "descrption"];
    protected $fillable = [
        'name',
        'image',
        'discriper',
        'descrption',
        'recomendCount',
        'recomendNum',
    ];
    public function opeside():HasMany
    {
        return $this->HasMany(opeside::class);
    }
    
    public function files(): MorphMany
    {
        return $this->morphMany(file::class, 'fileable');
    }
    public function users(): BelongsToMany
    {
        return $this->BelongsToMany(User::class,"course_users");
    }
}
