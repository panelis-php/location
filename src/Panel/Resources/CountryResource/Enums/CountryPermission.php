<?php

namespace Panelis\Location\Panel\Resources\CountryResource\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum CountryPermission: string implements HasLabel
{
    case Browse = 'BrowseCountryLocation';

    case Read = 'ReadCountryLocation';

    case Edit = 'EditCountryLocation';

    case Add = 'AddCountryLocation';

    case Delete = 'DeleteCountryLocation';

    public function getLabel(): string
    {
        return __(sprintf('location::permission.name_%s', Str::snake($this->value)));
    }
}
