<?php

namespace Panelis\Location\Panel\Resources\RegionResource\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum RegionPermission: string implements HasLabel
{
    case Browse = 'BrowseRegionLocation';

    case Read = 'ReadRegionLocation';

    case Edit = 'EditRegionLocation';

    case Add = 'AddRegionLocation';

    case Delete = 'DeleteRegionLocation';

    public function getLabel(): string
    {
        return __(sprintf('location::permission.name_%s', Str::snake($this->value)));
    }
}
