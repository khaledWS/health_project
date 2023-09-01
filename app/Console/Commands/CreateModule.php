<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class CreateModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:module {name}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->singleClassName($this->argument('name'));
        $lowerName =  strtolower($name);
        $controller_path =  env(strtolower($this->argument('module')) . '_CONTROLLER_PATH');
        $service_path =  env(strtolower($this->argument('module')) . '_CONTROLLER_PATH');
        $repository_path =  env(strtolower($this->argument('module')) . '_CONTROLLER_PATH');

        $modelTemplate = <<<EOT
        <?php
        
        namespace App\Models;
        
        use Illuminate\Database\Eloquent\Model;
        use Illuminate\Database\Eloquent\SoftDeletes;
        use App\Traits\HashableTrait;
        
        class {$name} extends Model
        {
            use SoftDeletes;
        
            protected \$fillable = [
                // Specify your fillable fields here...
            ];
        
            /**
             * Eager load with every debt.
             */
            protected \$with = [
               // Eager load
            ];
        
            protected \$hidden = [
                'deleted_at'
            ];
        
        }
        EOT;

        $modelDir = app_path("Models");

        if (!File::exists($modelDir)) {
            File::makeDirectory($modelDir, 0777, true);
        }

        File::put("{$modelDir}/{$name}.php", $modelTemplate);
        $this->info("Model for {$name} created successfully.");


        $tableName =  Str::snake($name) . 's';


        Artisan::call('make:migration create_' . $tableName . '_table --table=' . $tableName);
        $this->info("Migration for {$tableName} created successfully.");



        Artisan::call('make:request', ['name' => "{$name}Request"]);
        $this->info("Request for {$name} created successfully.");

        // Create the repository and repository interface
        $repositoryDir = app_path("Repositories");

        if (!File::exists($repositoryDir)) {
            File::makeDirectory($repositoryDir, 0777, true);
        }

        $repositoryTemplate = <<<EOT
        <?php
        
        namespace App\Repositories;
        
        use App\Http\Requests\\{$name}Request;
        use App\Models\\{$name};
        
        class {$name}Repository
        {
            private \${$lowerName};
        
            public function __construct({$name} \${$lowerName})
            {
                \$this->{$lowerName} = \${$lowerName};
            }
        
            public function all()
            {
                // Implement the logic here...
            }
        
        
            public function find(\$id)
            {
                return \$this->{$lowerName}-find(\$id);
            }
        
            public function store(array \$attributes)
            {
                {$name}::create(\$attributes);
            }
        
            public function update(array \$attributes, \$id)
            {
                \$item = \$this->find(\$id);
                \$item->update(\$attributes);
            }
        
            function delete(\$id)
            {
                \${$lowerName} = \$this->find(\$id);
        
                return \${$lowerName}->delete();
        
            }
        }
        EOT;


        File::put("{$repositoryDir}/{$name}Repository.php", $repositoryTemplate);
        $this->info("{$name}Repository created successfully.");


        $controllerName = "{$name}Controller";
        $controller_namespace = rtrim(str_replace("/", "\\", env($this->argument('module') . '_CONTROLLER_PATH')), "\\");
        $controllerTemplate = <<<EOT
<?php

namespace App\\{$controller_namespace};

use App\Http\Controllers\Controller;
use App\Http\Requests\\{$name}Request;
use App\Services\\{$name}Service;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Helpers\MainHelper;
use Illuminate\Support\Facades\DB;

class {$controllerName} extends Controller
{
use ResponseTrait;

protected \${$lowerName}Repository;


/**
 * array `functions` to classification of functions
 *
 * @var array
 */
protected \$functions = [
    'GET' => [
        'index' => [
            'permission' => '{$module}.{$lowerName}.index',
            'parameters' => [],
        ],
        'dataTable' => [
            'permission' => '{$module}.{$lowerName}.index',
            'parameters' => ['request'],
        ],
        'create' => [
            'permission' => '{$module}.{$lowerName}.create',
            'parameters' => [],
        ],
        'edit' => [
            'permission' => '{$module}.{$lowerName}.edit',
            'parameters' => ['hashId'],
        ],
        'show' => [
            'permission' => '{$module}.{$lowerName}.show',
            'parameters' => ['hashId'],
        ],
    ],
    'POST' => [
        'store' => [
            'permission' => '{$module}.{$lowerName}.create',
            'parameters' => ['{$name}Request'],
        ],
        'update' => [
            'permission' => '{$module}.{$lowerName}.edit',
            'parameters' => ['{$name}Request','hashId'],
        ],
        'destroy' => [
            'permission' => '{$module}.{$lowerName}.delete',
            'parameters' => ['hashId'],
        ],
        'changeStatus' => [
            'permission' => '{$module}.{$lowerName}.changeStatus',
            'parameters' => ['hashId'],
        ],
    ],
];

public function __invoke(Request \$request, \$controllerFunction = "index",\$hashId = null)
{
    \$method = \$request->method();

    if (isset(\$this->functions[\$method][\$controllerFunction])) {
        \$permission = \$this->functions[\$method][\$controllerFunction]['permission'];
        if(\$permission){
            if (auth()->check() && !userHasPermissions(\$permission)) {
                return response()->json(['error' => 'Function is not found or unauthorized'], 404);
          }
        }

        \$parameters = \$this->functions[\$method][\$controllerFunction]['parameters'];

        if (!empty(\$parameters)) {
            \$params = [];
            foreach (\$parameters as \$param) {
                if (\$param === '{$name}Request') {
                    \$params[] = app()->make({$name}Request::class);
                }
                elseif (\$param === 'request') {
                    \$params[] = \$request;
                } elseif (\$param === 'hashId') {
                    \$params[] = \$hashId;
                } else {
                    \$params[] = \$request->input(\$param);
                }
            }
            return \$this->\$controllerFunction(...\$params);
        }

        return \$this->\$controllerFunction();

    }

    return response()->json(['error' => 'Function is not found or unauthorized'], 404);
}


public function __construct({$name}RepositoryInterface \${$lowerName}Repository)
{
    \$this->{$lowerName}Repository = \${$lowerName}Repository;
}

public function index()
{
    return view('{$blade_path}.{$lowerName}.index');
}

public function dataTable(Request \$request)
{
    return \$this->{$lowerName}Repository->dataTable(\$request->all());
}

public function create()
{
    \$data =  [
        'form_id' => '{$lowerName}-createForm',
        'button_class' => 'submit{$name}-btn',
        'modal_id' => 'create-{$lowerName}-mdl',
        'modal_title' => 'عنون المودل',
        'success_message' => 'رسالة نجاح العملية',
        'button_title' => getLabel('general.save'),
        'validation' => \$this->getValidation(new {$name}Request())

    ];
    \$view =  view()->make('{$blade_path}.{$lowerName}.modal', \$data)->render();

    return \$this->generalResponse('TRUE','200','SUCCESS', 'HTML',\$view);

}

public function store({$name}Request \$request)
{

    try {
        DB::transaction(function () use (\$request) {
            \$this->{$lowerName}Repository->store(\$request->validated());
        });
        return \$this->generalResponse(true, 200, __('app.success'), []);

    } catch (\Exception \$e) {
        MainHelper::make_error_report([
            'error'=>\$e->getMessage(),
            'error_code'=>500,
            'details'=>"Error : ".\$e->getFile()." Line : ". \$e->getLine() . json_encode(request()->instance())
        ]);
        return \$this->generalResponse(false, 422, __('app.error'), []);
    }

}

public function show(\$hashId)
{
    \$data = \$this->{$lowerName}Repository->find(\$hashId);
    return view('{$blade_path}.{$lowerName}.show', compact('data'));
}

public function edit(\$hashId)
{
\$item = \$this->{$lowerName}Repository->find(\$hashId);

    \$data = [
        'form_id' => '{$lowerName}-editForm',
        'button_class' => 'update{$name}-btn',
        'modal_id' => 'edit-{$lowerName}-mdl',
        'modal_title' => ' ',
        'success_message' => ' ',
        'button_title' => getLabel('general.save'),
        'item' => \$item,
        'validation' => \$this->getValidation(new {$name}Request())

    ];

    \$view =  view()->make('{$blade_path}.{$lowerName}.modal', \$data)->render();

    return \$this->generalResponse('TRUE','200','SUCCESS', 'HTML',\$view);
}

public function update({$name}Request \$request, \$hashId)
{
    try {
        DB::transaction(function () use (\$hashId, \$request) {
        \$this->{$lowerName}Repository->update(\$request->validated(), \$hashId);
    });

    return \$this->generalResponse(true, 200, __('app.success'), []);
    } catch (\Exception \$e) {
        MainHelper::make_error_report([
            'error' => \$e->getMessage(),
            'error_code' => 500,
            'details' => "Error : ".\$e->getFile()." Line : ". \$e->getLine() . json_encode(request()->instance())
        ]);

        return \$this->generalResponse(false, 500, __('app.error'), []);
    }

}

public function destroy(\$hashId)
{
    \${$lowerName}Destroy = \$this->{$lowerName}Repository->delete(\$hashId);

    if (\${$lowerName}Destroy)
        return \$this->generalResponse(true, 200, __('app.success'), []);
    return \$this->generalResponse(false, 422, __('app.error'), []);
}

public function changeStatus(\$hashId)
{
    return \$this->{$lowerName}Repository->changeStatus(\$hashId);
}
}
EOT;
    }

    public function singleClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }
}
