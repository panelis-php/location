<?php

namespace Panelis\Location\Models;

use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Panelis\Location\Database\Factories\RegionFactory;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;

#[UseFactory(RegionFactory::class)]
class Region extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'country_id',
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
            ->logOnly(['country_id', 'name', 'is_active'])
            ->logOnlyDirty()
            ->dontLogEmptyChanges();
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return 'location::activity.region.'.$eventName;
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}
