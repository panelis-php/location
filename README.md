# Panelis Location

Manage countries, provinces, and cities directly from the Panelis admin panel.

## Features

* Country management
* Province management
* City management
* Hierarchical location structure
* Search and filtering
* Automatic Panelis plugin discovery

## Requirements

* PHP 8.3+
* Laravel 13+
* Filament 5+

## Installation

Install the package via Composer:

```bash
composer require panelis-php/location
```

Run migrations:

```bash
php artisan migrate
```

## Usage

After installation, a **Locations** menu will be available in the Panelis admin panel.

The Location module provides a centralized location database that can be used by other modules and applications.

Available location types include:

* Countries
* Provinces
* Cities

Locations are organized hierarchically:

```text
Country
└── Province
    └── City
```

Example:

```text
Indonesia
└── Central Java
    └── Wonosobo
```

This module is useful for applications that require structured geographic data, such as:

* Event management
* Multi-branch organizations
* Directories
* Booking platforms
* Logistics systems

## License

The MIT License (MIT).
