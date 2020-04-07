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

          // Return success
          $command->info('Starter Pack Preset installed !');

      });

      // VIEWS
      $this->loadViewsFrom(__DIR__.'/../resources/views', 'sp');

      // Load the blades
      Blade::component('sp-search', \Sp\View\Components\Search::class);
      Blade::component('sp-listing', \Sp\View\Components\Listing::class);
      Blade::component('sp-statistic', \Sp\View\Components\Statistic::class);
      Blade::component('sp-toast', \Sp\View\Components\Toast::class);
      Blade::component('sp-modal-confirm', \Sp\View\Components\ModalConfirm::class);


    }
}
