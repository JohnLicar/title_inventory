<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Awardee extends Model
{
    use HasFactory;

    protected $fillable = [
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
     * Get the user's formatted spouse_birthday.
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

    public function unit(): HasOne
    {
        return $this->hasOne(Unit::class);
    }

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function ($query) use ($searchTerm) {
            $query->where('first_name', 'like', "%$searchTerm%")
                ->orWhere('last_name', 'like', "%$searchTerm%")
                ->orWhere('middle_name', 'like', "%$searchTerm%");
        });
    }
}
