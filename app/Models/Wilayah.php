<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wilayah extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author', 'jenis_perdin'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function jenis_perdin(): BelongsTo
    {
        return $this->belongsTo(JenisPerdin::class, 'jenis_perdin_id');
    }

    public function uang_harians(): HasMany
    {
        return $this->hasMany(UangHarian::class, 'wilayah');
    }

    public function uang_transports(): HasMany
    {
        return $this->hasMany(UangTransport::class, 'wilayah');
    }

    public function uang_penginapans(): HasMany
    {
        return $this->hasMany(UangPenginapan::class, 'wilayah');
    }

    public function data_perdins(): HasMany
    {
        return $this->hasMany(DataPerdin::class, 'tujuan');
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
