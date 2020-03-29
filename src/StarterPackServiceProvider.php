<?php
namespace Nh\StarterPack;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

use Nh\StarterPack\BackendPreset;
use Nh\StarterPack\FrontendPreset;
use Nh\StarterPack\GlobalPreset;


class StarterPackServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      UiCommand::macro('sp', function(UiCommand $command) {

          // Install the Presets
          GlobalPreset::install();
          FrontendPreset::install();
          BackendPreset::install();

          $command->info('Starter Pack Preset installed !');

      });
    }
}
