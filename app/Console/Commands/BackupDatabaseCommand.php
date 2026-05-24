<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

#[Signature('backup:database')]
#[Description('Crea un respaldo de la base de datos SQLite')]
class BackupDatabaseCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $source = database_path('database.sqlite');

        if (! File::exists($source)) {
            $this->error("La base de datos SQLite no existe en: {$source}");

            return 1;
        }

        $backupDir = storage_path('backups');

        if (! File::isDirectory($backupDir)) {
            File::makeDirectory($backupDir, 0755, true);
        }

        $timestamp = date('Y-m-d_H-i-s');
        $filename = "database-{$timestamp}.sqlite";
        $destination = "{$backupDir}/{$filename}";

        if (File::copy($source, $destination)) {
            $this->info("Respaldo creado con éxito: {$filename}");

            return 0;
        }

        $this->error('No se pudo copiar el archivo de base de datos.');

        return 1;
    }
}
