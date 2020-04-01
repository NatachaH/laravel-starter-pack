<?php
namespace Nh\StarterPack;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;
use Illuminate\Support\Facades\Blade;

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
          UsersPreset::install();

          // Load the blades
          Blade::component('search', \App\View\Components\Backend\Search::class);
          Blade::component('listing', \App\View\Components\Backend\Listing::class);
          Blade::component('statistic', \App\View\Components\Backend\Statistic::class);

          // Return success
          $command->info('Starter Pack Preset installed !');

      });
    }
}
