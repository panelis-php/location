<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Panelis\Location\Models\Country;
use Spatie\Activitylog\Models\Activity;

uses(RefreshDatabase::class);

it('logs country lifecycle activity', function (): void {
    $country = Country::factory()->create();
    $activity = Activity::query()->where('subject_id', $country->getKey())->firstOrFail();

    expect($activity->log_name)->toBe('location')
        ->and($activity->event)->toBe('created')
        ->and($activity->description)->toBe('location::activity.country.created');
});

it('does not log location activity when activity logging is disabled', function (): void {
    config()->set('activitylog.enabled', false);

    Country::factory()->create();

    expect(Activity::query()->count())->toBe(0);
});
