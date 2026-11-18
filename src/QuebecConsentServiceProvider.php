<?php

namespace JeffersonGoncalves\Filament\QuebecConsent;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class QuebecConsentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-quebec-consent')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations();
    }
}
