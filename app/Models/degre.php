<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\exam ;
use App\Models\User ;
class degre extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'user_id',
        'full',
        'degre',
    ];
    public function exam():BelongsTo
    {
        return $this->BelongsTo(exam::class) ;
    }
    public function user():BelongsTo
    {
        return $this->BelongsTo(User::class) ;
    }
}
