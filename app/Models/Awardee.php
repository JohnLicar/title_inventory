<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Awardee extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'last_name',
        'first_name',
        'middle_name',
        'birthday',
        'civil_status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'birthday' => 'datetime:Y-m-d',
        ];
    }
    /**
     * Get the user's full name.
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => ucfirst($this->first_name) . ' ' . ucfirst($this->middle_name) . ' ' . ucfirst($this->last_name),
        );
    }

    /**
     * Get the user's formatted birthday.
     */
    public function getFormattedBirthdayAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('Y-m-d');
    }

    public function spouse(): HasOne
    {
        return $this->hasOne(Spouse::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }


    /**
     * Scope a query to filter awardees based on site_id and search criteria.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $site_id
     * @param string|null $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter(Builder $query, $search = null, $site_id = null, $phase = null, $block = null, $lot = null)
    {
        return $query
            ->when(
                $site_id,
                fn (Builder $query, $site_id) =>
                $query->whereRelation('unit', 'site_id', $site_id)
            )

            ->when(
                $phase,
                fn (Builder $query, $phase) =>
                $query->whereRelation('unit', 'phase', $phase)
            )
            ->when(
                $block,
                fn (Builder $query, $block) =>
                $query->whereRelation('unit', 'block', $block)
            )
            ->when(
                $lot,
                fn (Builder $query, $lot) =>
                $query->whereRelation('unit', 'lot', $lot)
            )
            ->when(
                $search,
                fn (Builder $query, $search) =>
                $query->where(function ($query) use ($search) {
                    $query->whereLike(['first_name', 'middle_name', 'last_name'], $search)
                        ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%' . $search . '%'])
                        ->orWhereRaw("CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE ?", ['%' . $search . '%'])
                        ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ['%' . $search . '%']);
                })
            );
    }
}
