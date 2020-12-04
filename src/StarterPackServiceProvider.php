<?php
namespace Nh\StarterPack;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use View;


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

      // COMMANDES
      if ($this->app->runningInConsole()) {
          $this->commands([
              \Nh\StarterPack\Console\Commands\NewContentCommand::class,
              \Nh\StarterPack\Console\Commands\NewUserCommand::class,
              \Nh\StarterPack\Console\Commands\PresetCommand::class,
          ]);
      }

      // VIEWS
      $this->loadViewsFrom(__DIR__.'/../resources/views', 'sp');

      // VIEWS COMPOSERS
      View::composer(
        'sp::layouts.partials.breadcrumb', 'Nh\StarterPack\View\Composers\BreadcrumbComposer'
      );

      // TRANSLATIONS
      $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'sp');

      // BLADES
      Blade::component('sp-search', \Nh\StarterPack\View\Components\Search::class);
      Blade::component('sp-listing', \Nh\StarterPack\View\Components\Listing::class);
      Blade::component('sp-statistic', \Nh\StarterPack\View\Components\Statistic::class);
      Blade::component('sp-toast', \Nh\StarterPack\View\Components\Toast::class);
      Blade::component('sp-media-dynamic', \Nh\StarterPack\View\Components\Form\MediaDynamic::class);
      Blade::component('sp-media-listing', \Nh\StarterPack\View\Components\MediaListing::class);
      Blade::component('sp-history', \Nh\StarterPack\View\Components\History::class);

      // POLICIES
      Gate::policy('App\Models\User', \Nh\StarterPack\Policies\UserPolicy::class);
      Gate::policy('App\Models\Role', \Nh\StarterPack\Policies\RolePolicy::class);

      // Only a superadmin can set the role superadmin !
      Gate::define('set-user-role', function ($user, $roleId) {
          $role = \App\Models\Role::findOrFail($roleId);
          return $user->hasRoles('superadmin') || $role->name != 'superadmin';
      });

      // Only set the permission that the user have access
      Gate::define('set-role-permissions', function ($user, $permissions) {
          $restrictions = $user->role->restrictions()->modelKeys();
          return empty(array_intersect($permissions,$restrictions));
      });

    }

}
