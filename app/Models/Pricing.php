<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    protected $appends = [
        'benefits_formatted',
    ];

    /**
     * Get the benefits formatted.
     *
     * @return array
     */
    public function getBenefitsFormattedAttribute()
    {
        $benefits = array_map('trim', explode(',', $this->benefit));
        return $benefits;
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saving(function ($pricing) {
            if ($pricing->is_special_offer) {
                static::where('is_special_offer', true)
                    ->where('id', '!=', $pricing->id)
                    ->update(['is_special_offer' => false]);
            }
        });
    }
}
