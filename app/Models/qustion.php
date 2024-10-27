<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\exam ;
class qustion extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'q',
        'answr1',
        'answr2',
        'answr3',
        'answr4',
        'right',
        'degre',
    ];
    public function exam(): BelongsTo
    {
        return $this->BelongsTo(exam::class);
    }
}
