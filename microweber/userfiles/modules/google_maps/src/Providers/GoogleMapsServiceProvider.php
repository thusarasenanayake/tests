<?php


namespace MicroweberPackages\Modules\GoogleMaps\Providers;


use Livewire\Livewire;

use MicroweberPackages\Module\Facades\ModuleAdmin;
use MicroweberPackages\Modules\GoogleMaps\Http\Livewire\GoogleMapsSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class GoogleMapsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('microweber-module-google-maps');
        $package->hasViews('microweber-module-google-maps');
    }

    public function register(): void
    {

        parent::register();
        Livewire::component('microweber-module-google-maps::settings', GoogleMapsSettingsComponent::class);
        ModuleAdmin::registerSettings('google_maps', 'microweber-module-google-maps::settings');

    }



}
