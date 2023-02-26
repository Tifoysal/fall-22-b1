<?php

namespace App\Console\Commands;

use App\Models\Permission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class createPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create all route name as permission.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $allRoutes=Route::getRoutes();
        foreach ($allRoutes as $route){

            if($route->getPrefix()=='/admin')
            {
                Permission::updateOrCreate([
                    'name'=>$route->getName()
                ]);
            }
        }
        echo "All permissions created successfully";
        return 0;
    }
}
