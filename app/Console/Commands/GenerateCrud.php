<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateCrud extends Command
{
    protected $signature = 'make:crud
                            {name : The name of the model}
                            {--translatable : Indicates if the model has translatable fields}
                            {--media : Indicates if the model uses media}
                            {--filter : Indicates if the views have filters}';

    protected $description = 'Generate CRUD operation files, including controller, views, routes, filters, and translations';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $lowerName = Str::snake($name);
        $pluralName = Str::pluralStudly($name);
        // Generate Controller
        $this->generateController($name, $pluralName);

        $this->generateRequest($name, $pluralName);

        // Generate Views
        $this->generateViews($lowerName);

        // Add Route
        $this->addRoute($lowerName);

        // Generate Filters
        if ($this->option('filter')) {
            $this->generateFilter($name);
        }

        // Generate Translations
        $this->generateTranslations($lowerName);

        $this->info("CRUD for {$name} generated successfully!");
    }

    protected function generateController($name, $pluralName)
    {
        $controllerPath = app_path("Http/Controllers/{$name}Controller.php");
        $stub = File::get(resource_path('stubs/controller.stub'));

        $content = str_replace(
            ['{{modelName}}', '{{modelPlural}}'],
            [$name, $pluralName],
            $stub
        );

        File::put($controllerPath, $content);
        $this->info("Controller created: {$controllerPath}");
    }

    protected function generateViews($lowerName)
    {
        $viewsPath = resource_path("views/dashboard/{$lowerName}");
        File::ensureDirectoryExists($viewsPath);

        $stubs = ['index', 'create', 'edit', 'show'];
        foreach ($stubs as $stub) {
            $stubContent = File::get(resource_path("stubs/{$stub}.stub"));
            $viewPath = "{$viewsPath}/{$stub}.blade.php";
            $content = str_replace('{{modelName}}',$lowerName,$stubContent);
            File::put($viewPath, $content);
            $this->info("View created: {$viewPath}");
        }
    }

    protected function addRoute($lowerName)
    {
        $capitalized = Str::ucfirst($lowerName);
        $route = "Route::resource('{$lowerName}', {$capitalized}Controller::class);\n";
        File::append(base_path('routes/dashboard.php'), $route);
        $this->info("Route added: {$route}");
    }

    protected function generateFilter($name)
    {
        $filterPath = app_path("Filters/{$name}Filter.php");
        $stub = File::get(resource_path('stubs/filter.stub'));

        $content = str_replace('{{modelName}}', $name, $stub);
        File::put($filterPath, $content);
        $this->info("Filter created: {$filterPath}");
    }
    protected function generateRequest($name)
    {
        $requestPath = app_path("Http/Requests/{$name}Request.php");
        $stub = File::get(resource_path('stubs/request.stub'));

        $content = str_replace('{{modelName}}', $name, $stub);
        File::put($requestPath, $content);
        $this->info("Request created: {$requestPath}");
    }

    protected function generateTranslations($lowerName)
    {
        $langPathEn = base_path("lang/en/{$lowerName}.php");
        $langPathAr = base_path("lang/ar/{$lowerName}.php");
        $stub = File::get(resource_path('stubs/translation.stub'));

        File::put($langPathEn, $stub);
        File::put($langPathAr, $stub);
        $this->info("Translation file created: {$langPathEn}");
    }
}
