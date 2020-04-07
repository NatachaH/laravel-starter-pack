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

      // TRANSLATIONS
      $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'sp');

      // BLADES
      Blade::component('sp-search', \Nh\StarterPack\View\Components\Search::class);
      Blade::component('sp-listing', \Nh\StarterPack\View\Components\Listing::class);
      Blade::component('sp-statistic', \Nh\StarterPack\View\Components\Statistic::class);
      Blade::component('sp-toast', \Nh\StarterPack\View\Components\Toast::class);
      Blade::component('sp-modal-confirm', \Nh\StarterPack\View\Components\ModalConfirm::class);

      // COMMANDES
      if ($this->app->runningInConsole()) {
          $this->commands([
              \Nh\StarterPack\Commands\NewContentCommand::class,
          ]);
      }

    }
}
