<?php

namespace Panelis\Location\Panel\Resources\DistrictResource\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum DistrictPermission: string implements HasLabel
{
    case Browse = 'BrowseDistrictLocation';

    case Read = 'ReadDistrictLocation';

    case Edit = 'EditDistrictLocation';

    case Add = 'AddDistrictLocation';

    case Delete = 'DeleteDistrictLocation';

    public function getLabel(): string
    {
        return __(sprintf(
            'location::permission.name_%s',
            str(Str::snake($this->value))->replace('district', 'city')->toString(),
        ));
    }
}
