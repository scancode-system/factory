<?php

namespace Modules\Factory\Providers;

use Livewire\Livewire;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Blade;
use Modules\Factory\Entities\Command;
use Modules\Factory\Entities\Produce;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Factory\Entities\CommandFabric;
use Modules\Factory\Entities\CommandRisk;
use Modules\Factory\Observers\CommandObserver;
use Modules\Factory\Observers\ProduceObserver;
use Modules\Factory\Http\Livewire\AlertComponent;
use Modules\Factory\Observers\CommandFabricObserver;
use Modules\Factory\Http\Livewire\Color\ColorCrudComponent;
use Modules\Factory\Http\Livewire\Command\CommandComponent;
use Modules\Factory\Http\Livewire\Produce\ProduceComponent;
use Modules\Factory\Http\Livewire\ReferenceCreateComponent;
use Modules\Factory\Http\Livewire\Shape\ShapeCrudComponent;
use Modules\Factory\Http\Livewire\Fabric\FabricCrudComponent;
use Modules\Factory\Http\Livewire\Produce\ProduceFormComponent;
use Modules\Factory\Http\Livewire\Collection\CollectionComponent;
use Modules\Factory\Http\Livewire\Command\CommandRiskListComponent;
use Modules\Factory\Http\Livewire\Reference\ReferenceEditComponent;
use Modules\Factory\Http\Livewire\Reference\ReferenceListComponent;
use Modules\Factory\Http\Livewire\Command\CommandFabricListComponent;
use Modules\Factory\Http\Livewire\Command\CommandRiskCreateComponent;
use Modules\Factory\Http\Livewire\Command\CommandFabricCreateComponent;
use Modules\Factory\Http\Livewire\Reference\ReferenceCategoryComponent;
use Modules\Factory\Observers\CommandRiskObserver;

class FactoryServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Factory';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'factory';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

        Schema::defaultStringLength(191);

        Fortify::loginView(function () {
            return view('factory::auth.login');
        });

        Fortify::registerView(function () {
            return view('factory::auth.register');
        });


        Livewire::component('command-risk-list-component', CommandRiskListComponent::class);
        Livewire::component('command-risk-create-component', CommandRiskCreateComponent::class);
        Livewire::component('command-fabric-create-component', CommandFabricCreateComponent::class);
        Livewire::component('command-fabric-list-component', CommandFabricListComponent::class);
        Livewire::component('command-component', CommandComponent::class);
        Livewire::component('collection-component', CollectionComponent::class);
        Livewire::component('color-crud-component', ColorCrudComponent::class);
        Livewire::component('shape-crud-component', ShapeCrudComponent::class);
        Livewire::component('fabric-crud-component', FabricCrudComponent::class);
        Livewire::component('reference-category-component', ReferenceCategoryComponent::class);
        Livewire::component('reference-list-component', ReferenceListComponent::class);
        Livewire::component('reference-create-component', ReferenceCreateComponent::class);
        Livewire::component('reference-edit-component', ReferenceEditComponent::class);
        Livewire::component('produce-component', ProduceComponent::class);
        Livewire::component('produce-form-component', ProduceFormComponent::class);
        Livewire::component('alert-component', AlertComponent::class);


        Blade::directive('currency', function ($expression) {
			return "<?php echo 'R$' . number_format($expression, 2, ',', '.'); ?>";
        });
        
        Blade::directive('meter_kg', function ($expression) {
			return "<?php echo $expression.' m/Kg'; ?>";
        });
        
        Blade::directive('meter', function ($expression) {
			return "<?php echo number_format($expression, 2, ',', '.').'m'; ?>";
        });
        
        Blade::directive('kilo', function ($expression) {
			return "<?php echo number_format($expression, 2, ',', '.').'Kg'; ?>";
        });
        
        Produce::observe(ProduceObserver::class);
        Command::observe(CommandObserver::class);
        CommandFabric::observe(CommandFabricObserver::class);
        CommandRisk::observe(CommandRiskObserver::class);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );

        $this->publishes([
            module_path($this->moduleName, 'Config/snappy.php') => config_path('snappy.php'),
        ], 'config');
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            //app(Factory::class)->load(module_path($this->moduleName, 'Database/factories'));
            $this->loadFactoriesFrom(module_path($this->moduleName, '$FACTORIES_PATH$'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
