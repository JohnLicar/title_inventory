<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'spouse_last_name',
        'spouse_first_name',
        'spouse_middle_name',
        'spouse_birthday',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'spouse_birthday' => 'datetime:Y-m-d',
        ];
    }


    /**
     * Get the user's full name.
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => ucfirst($this->spouse_first_name) . ' ' . ucfirst($this->spouse_middle_name) . ' ' . ucfirst($this->spouse_last_name),
        );
    }

    /**
     * Get the user's formatted spouse_birthday.
     */
    /**
     * Get the user's formatted spouse_birthday.
     */
    public function getFormattedBirthdayAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('Y-m-d');
    }
}
