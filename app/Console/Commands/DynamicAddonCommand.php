<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DynamicAddonCommand extends Command
{
    protected $signature = 'make:addon{type} {addon} {name}';
    public function handle()
    {
        $type  = $this->argument('type');
        $addon = $this->argument('addon');
        $name  = $this->argument('name');

        if ($type == 'addonMigration') {
            // Define the migration path
            $migration_path = app_path("Addons/{$addon}/database/migrations");
            $timestamp      = date('Y_m_d_His');
            $file_name      = "{$timestamp}_{$name}.php";
            $file_path      = "{$migration_path}/$file_name";

            $table_name_arr = explode('_', $name);
            $table_name     = $table_name_arr[1];
        }
        if ($type == 'addonModel') {}
        if ($type == 'addonController') {}
        if ($type == 'addonView') {}
        if ($type == 'addonMail') {}
        if ($type == 'addonProvider') {}
        if ($type == 'addonRequest') {}
        if ($type == 'addonRule') {}
    }
}