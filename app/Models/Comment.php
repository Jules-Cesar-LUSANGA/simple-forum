<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public function discussion() : BelongsTo
    {
        return $this->belongsTo(Discussion::class);
    }
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
