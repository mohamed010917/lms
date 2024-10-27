<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\exam ;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\course ;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\file ;
use App\Models\comment ;
class opeside extends Model
{   
    use HasFactory,HasTranslations;
    public $translatable = ["name" , "descrption"];
    protected $fillable = [
        'name',
        'image',
        'video',
        'descrption',
        'viwes',
        'recomendCount',
        'recomendNum',
        'course_id',
    ];
    public function course():BelongsTo
    {
        return $this->BelongsTo(course::class) ;
    }
    public function files(): MorphMany
    {
        return $this->morphMany(file::class, 'fileable');
    }
    public function exams(): HasMany
    {
        return $this->HasMany(exam::class);
    }
    public function comment(): HasMany
    {
        return $this->HasMany(comment::class);
    }

}
