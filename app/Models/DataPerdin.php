<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPerdin extends Model
{
    use HasFactory, Sluggable, SoftDeletes, CascadeSoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author', 'tanda_tangan', 'alat_angkut', 'jenis_perdin', 'tujuan', 'pegawai_diperintah', 'status'];
    protected $cascadeDeletes = ['status', 'laporan_perdin', 'kwitansi_perdin'];

    public function getTtdFormatedAttribute()
    {
        $words = explode(' ', $this->tanda_tangan->pegawai->jabatan->nama);

        if (count($words) > 3) {
            $line1 = implode(' ', array_slice($words, 0, 2));
            $line2 = implode(' ', array_slice($words, 2));
            return "{$line1}<br>{$line2}";
        } else {
            $line = implode(' ', $words);
            return "{$line}";
        }
    }

    public static function filterByStatus($status)
    {
        return static::latest()->whereHas('status', function ($query) use ($status) {
            if ($status === 'baru') {
                $query->where('approve', null);
            } elseif ($status === 'tolak') {
                $query->where('approve', 0);
            } elseif ($status === 'no_laporan') {
                $query->where('approve', 1)->where('lap', null);
            } elseif ($status === 'belum_bayar') {
                $query->where('approve', 1)->where('lap', 1)->where('kwitansi', null);
            } elseif ($status === 'sudah_bayar') {
                $query->where('approve', 1)->where('lap', 1)->where('kwitansi', 1);
            }
        });
    }

    public static function getTotalByStatus($statusArray = null, $isCurrentMonth = false)
    {
        $query = self::query();

        if ($statusArray) {
            $query->whereHas('status', function ($query) use ($statusArray) {
                foreach ($statusArray as $field => $value) {
                    $query->where($field, $value);
                }
            });
        }

        if ($isCurrentMonth) {
            $query->whereMonth('created_at', '=', now()->month);
        }

        return $query->count();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tanda_tangan(): BelongsTo
    {
        return $this->belongsTo(TandaTangan::class, 'tanda_tangan_id');
    }

    public function alat_angkut(): BelongsTo
    {
        return $this->belongsTo(AlatAngkut::class, 'alat_angkut_id');
    }

    public function jenis_perdin(): BelongsTo
    {
        return $this->belongsTo(JenisPerdin::class, 'jenis_perdin_id');
    }

    public function tujuan(): BelongsTo
    {
        return $this->belongsTo(Wilayah::class, 'tujuan_id');
    }

    public function pegawai_diperintah(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_diperintah_id');
    }

    public function pegawai_mengikuti(): BelongsToMany
    {
        return $this->belongsToMany(Pegawai::class, 'perdin_pegawai', 'data_perdin_id', 'pegawai_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusPerdin::class, 'status_id');
    }

    public function laporan_perdin(): BelongsTo
    {
        return $this->belongsTo(LaporanPerdin::class, 'laporan_perdin_id');
    }

    public function kwitansi_perdin(): BelongsTo
    {
        return $this->belongsTo(KwitansiPerdin::class, 'kwitansi_perdin_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'maksud',
                'includeTrashed' => true,
                ]
            ];
        }
    }
