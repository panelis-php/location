<?php

namespace Panelis\Location\Models;

use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Panelis\Location\Database\Factories\CountryFactory;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;

#[UseFactory(CountryFactory::class)]
class Country extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'alpha2',
        'alpha3',
        'un_code',
        'name',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'bool',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('location')
            ->logOnly(['alpha2', 'alpha3', 'un_code', 'name', 'is_active'])
            ->logOnlyDirty()
            ->dontLogEmptyChanges();
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return 'location::activity.country.'.$eventName;
    }

    public function regions(): HasMany
    {
        return $this->hasMany(Region::class);
    }
}
