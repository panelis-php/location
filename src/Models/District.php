<?php

namespace Panelis\Location\Models;

use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Panelis\Location\Database\Factories\DistrictFactory;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;

#[UseFactory(DistrictFactory::class)]
class District extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'region_id',
        'name',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('location')
            ->logOnly(['region_id', 'name', 'is_active'])
            ->logOnlyDirty()
            ->dontLogEmptyChanges();
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return 'location::activity.district.'.$eventName;
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
