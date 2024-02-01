<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPerdin extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function wilayahs(): HasMany
    {
        return $this->hasMany(Wilayah::class, 'jenis_perdin_id');
    }

    public function data_perdins(): HasMany
    {
        return $this->hasMany(DataPerdin::class, 'jenis_perdin_id');
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
