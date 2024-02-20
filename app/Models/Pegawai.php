<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, Sluggable, SoftDeletes, CascadeSoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author', 'seksi', 'bidang', 'golongan', 'jabatan', 'pangkat', 'ketentuan'];
    protected $cascadeDeletes = ['ketentuan'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function seksi(): BelongsTo
    {
        return $this->belongsTo(Seksi::class, 'seksi_id');
    }

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    public function golongan(): BelongsTo
    {
        return $this->belongsTo(Golongan::class, 'golongan_id');
    }

    public function pangkat(): BelongsTo
    {
        return $this->belongsTo(Pangkat::class, 'pangkat_id');
    }

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function ketentuan(): BelongsTo
    {
        return $this->belongsTo(Ketentuan::class, 'ketentuan_id');
    }

    public function tanda_tangans(): HasMany
    {
        return $this->hasMany(TandaTangan::class, 'pegawai_id');
    }

    public function data_perdins_diperintah(): HasMany
    {
        return $this->hasMany(DataPerdin::class, 'pegawai_diperintah_id');
    }

    public function data_perdin_mengikuti()
    {
        return $this->belongsToMany(DataPerdin::class, 'perdin_pegawai', 'pegawai_id', 'data_perdin_id');
    }

    public function kwitansi_perdins_pptk(): HasMany
    {
        return $this->hasMany(KwitansiPerdin::class, 'pptk_id');
    }

    public function kwitansi_perdins()
    {
        return $this->belongsToMany(KwitansiPerdin::class, 'kwitansi_pegawai', 'pegawai_id', 'kwitansi_perdin_id')
        ->withPivot('uang_harian', 'uang_transport', 'uang_tiket', 'uang_penginapan');
    }

    public function bendaharas(): HasMany
    {
        return $this->hasMany(Bendahara::class, 'pegawai_id');
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
