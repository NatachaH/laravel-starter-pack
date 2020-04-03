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

      // Load the blades
      Blade::component('sp-search', \App\View\Components\Backend\Search::class);
      Blade::component('sp-listing', \App\View\Components\Backend\Listing::class);
      Blade::component('sp-statistic', \App\View\Components\Backend\Statistic::class);
      Blade::component('sp-toast', \App\View\Components\Backend\Toast::class);
      Blade::component('sp-modal-confirm', \App\View\Components\Backend\ModalConfirm::class);


    }
}
