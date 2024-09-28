<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeAddonMigration extends Command
{
    protected $signature   = 'make:addonMigration {addon} {name}';
    protected $description = 'Create a new migration for post addon';

    public function handle()
    {
        $addon = $this->argument('addon');
        $name  = $this->argument('name');

        // Define the migration path
        $migration_path = app_path("Addons/{$addon}/database/migrations");

        if (! File::exists($migration_path)) {
            $this->error("The addon {$addon} does not exist.");
            return;
        }

        // Generate the timestamp for the migration
        $timestamp = date('Y_m_d_His');
        $file_name = "{$timestamp}_{$name}.php";
        $file_path = "{$migration_path}/$file_name";

        $table_name_arr = explode('_', $name);
        $table_name     = $table_name_arr[1];

        // Create the migration file
        File::put($file_path, $this->getMigrationStub($table_name));

        $this->info("Migration created successfully: {$file_name}");
    }

    protected function getMigrationStub($table_name)
    {
        return <<<EOL
        <?php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;

        return new class extends Migration
        {
            public function up(): void
            {
                Schema::create('{$table_name}', function (Blueprint \$table) {
                    \$table->id();
                    \$table->timestamps();
                });
            }

            public function down(): void
            {
                Schema::dropIfExists('{$table_name}');
            }
        };
        EOL;
    }
}