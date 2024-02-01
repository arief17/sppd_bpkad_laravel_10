<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author', 'seksi'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function seksi(): BelongsTo
    {
        return $this->belongsTo(Seksi::class, 'seksi_id');
    }

    public function kegiatan_subs(): HasMany
    {
        return $this->hasMany(KegiatanSub::class, 'kegiatan_id');
    }

    public function ketentuans(): HasMany
    {
        return $this->hasMany(Ketentuan::class, 'kegiatan_id');
    }

    public function kwitansi_perdins(): HasMany
    {
        return $this->hasMany(KwitansiPerdin::class, 'kegiatan_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama',
                'includeTrashed' => true,
            ]
        ];
    }
}
