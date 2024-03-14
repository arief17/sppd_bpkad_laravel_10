<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TandaTangan extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author', 'pegawai'];

    public function getFileTtdEncodedAttribute()
    {
        if ($this->file_ttd) {
            $fileContents = file_get_contents(storage_path('app/' . $this->file_ttd));
            return base64_encode($fileContents);
        }
        return 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=';
    }

    public function getJenisTtdFAttribute()
    {
        if ($this->jenis_ttd) {
            if ($this->jenis_ttd == 'pemberi_perintah') {
                return 'Pejabat Pemberi Perintah';
            } elseif ($this->jenis_ttd == 'pptk') {
                return 'Petugas Pelaksana Teknis Kegiatan';
            } elseif ($this->jenis_ttd == 'pengguna_anggaran') {
                return 'Pengguna Anggaran';
            } else {
                return 'Kuasa Pengguna Anggaran';
            }
        }
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function data_perdins(): HasMany
    {
        return $this->hasMany(DataPerdin::class, 'tanda_tangan_id');
    }

    public function data_perdins_pptk(): HasMany
    {
        return $this->hasMany(DataPerdin::class, 'pptk_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['pegawai.nama', 'pegawai.jabatan.nama'],
                'includeTrashed' => true,
                ]
            ];
        }
    }
