<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'phase',
        'block',
        'lot',
        'reblocking_phase',
        'reblocking_block',
        'reblocking_lot',
        'date_endorsed	',
        'date_released',
    ];


    public function title(): HasOne
    {
        return $this->hasOne(Title::class);
    }

    public function awardee(): HasOne
    {
        return $this->hasOne(Awardee::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
