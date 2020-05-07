<?php
namespace Nh\StarterPack;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;

use Artisan;

use Nh\StarterPack\BackendPreset;
use Nh\StarterPack\FrontendPreset;
use Nh\StarterPack\GlobalPreset;
use Nh\StarterPack\UserPreset;

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

          // Artisan commandes for Bs Component Package
          Artisan::call('vendor:publish --tag=bs-component');

          // Artisan commandes for Access Control Package
          Artisan::call('vendor:publish --tag=access-control');
          Artisan::call('role:new user');

          // Artisan commandes for Mediable Package
          Artisan::call('vendor:publish --tag=mediable');

          // Artisan commandes for Trackable Package
          Artisan::call('vendor:publish --tag=trackable');

          // Return success
          $command->info('The Starter Pack Preset is installed !');

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
      Blade::component('sp-media-fieldset', \Nh\StarterPack\View\Components\Form\MediaFieldset::class);
      Blade::component('sp-media-listing', \Nh\StarterPack\View\Components\MediaListing::class);
      Blade::component('sp-track-listing', \Nh\StarterPack\View\Components\TrackListing::class);

      // COMMANDES
      if ($this->app->runningInConsole()) {
          $this->commands([
              \Nh\StarterPack\Commands\NewContentCommand::class,
              \Nh\StarterPack\Commands\NewUserCommand::class,
          ]);
      }

      // POLICIES
      Gate::policy('App\User', \Nh\StarterPack\Policies\UserPolicy::class);
      Gate::policy('Nh\AccessControl\Role', \Nh\StarterPack\Policies\RolePolicy::class);

      // Only a superadmin can set the role superadmin !
      Gate::define('set-user-role', function ($user, $roleId) {
          $role = \Nh\AccessControl\Role::findOrFail($roleId);
          return $user->hasRoles('superadmin') || $role->name != 'superadmin';
      });

      // Only set the permission that the user have access
      Gate::define('set-role-permissions', function ($user, $permissions) {
          $restrictions = $user->role->restrictions()->modelKeys();
          return empty(array_intersect($permissions,$restrictions));
      });

    }

}
