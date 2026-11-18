<?php

namespace JeffersonGoncalves\Filament\QuebecConsent;

use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class QuebecConsentServiceProvider extends BasePackageServiceProvider
{
    public static string $name = 'filament-quebec-consent';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasTranslations();
    }
}
