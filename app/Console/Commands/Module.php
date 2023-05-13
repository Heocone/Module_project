<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Module extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create module CLI';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        if (File::exists(base_path('modules/'.$name))) {
            $this->error('Module already exists!');
        }
        else{
            File::makeDirectory(base_path('modules/'.$name),0755,true,true);

            //config
            $configFolder = base_path('modules/'.$name.'/configs');
            if (!File::exists($configFolder)) {
                File::makeDirectory($configFolder,0755,true,true);
            }

            //helper
            $helperFolder = base_path('modules/'.$name.'/helpers');
            if (!File::exists($helperFolder)) {
                File::makeDirectory($helperFolder,0755,true,true);
            }

            //migration
            $migartionFolder = base_path('modules/'.$name.'/migartions');
            if (!File::exists($migartionFolder)) {
                File::makeDirectory($migartionFolder,0755,true,true);
            }

            //resources
            $resourcesFoles = base_path('modules/'.$name.'/resources');
            if (!File::exists($resourcesFoles)) {
                File::makeDirectory($resourcesFoles,0755,true,true);

                //language
                $languageFolder = base_path('modules/'.$name.'/resources/languages');
                if (!File::exists($languageFolder)) {
                    File::makeDirectory($languageFolder,0755,true,true);
                }

                //views
                $viewsFolder = base_path('modules/'.$name.'/resources/views');
                if (!File::exists($viewsFolder)) {
                    File::makeDirectory($viewsFolder,0755,true,true);
                }

            }

            //routes
            $routesFolder = base_path('modules/'.$name.'/routes');
            if (!File::exists($routesFolder)) {
                File::makeDirectory($routesFolder,0755,true,true);

                $routesFile = base_path('modules/'.$name.'/routes/routes.php');
                if (!File::exists($routesFile)) {
                    File::put($routesFile,"<?php");
                }
            }

            //src
            $srcFolder = base_path('modules/'.$name.'/src');
            if (!File::exists($srcFolder)) {
                File::makeDirectory($srcFolder,0755,true,true);
                
                //commands
                $commandsFolder = base_path('modules/'.$name.'/src/Commands');
                if (!File::exists($commandsFolder)) {
                    File::makeDirectory($commandsFolder,0755,true,true);
                }

                //Http
                $httpFolder = base_path('modules/'.$name.'/src/Http');
                if (!File::exists($httpFolder)) {
                    File::makeDirectory($httpFolder,0755,true,true);

                    //Controllers
                    $controllerFolder = base_path('modules/'.$name.'/src/Http/Controllers');
                    if (!File::exists($controllerFolder)) {
                        File::makeDirectory($controllerFolder,0755,true,true);
                    }

                    $middlewaresFolder = base_path('modules/'.$name.'/src/Http/Middlewares');
                    if (!File::exists($middlewaresFolder)) {
                        File::makeDirectory($middlewaresFolder,0755,true,true);
                    }
                }

                //Models
                $modelsFolder = base_path('modules/'.$name.'/src/Models');
                if (!File::exists($modelsFolder)) {
                    File::makeDirectory($modelsFolder,0755,true,true);
                }

            }
            $this->info('Module created successfully!');
        }
        
    }
}
