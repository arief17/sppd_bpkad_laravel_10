<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaporanPerdin extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function data_perdin(): HasOne
    {
        return $this->hasOne(DataPerdin::class, 'laporan_perdin_id');
    }
}
