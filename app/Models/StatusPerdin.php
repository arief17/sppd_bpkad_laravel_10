<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusPerdin extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function data_perdin(): HasOne
    {
        return $this->hasOne(DataPerdin::class, 'status_id');
    }
}
