<?php

use Illuminate\Support\Facades\File;

it('creates a timestamped SQLite database backup', function () {
    $backupDir = storage_path('backups');

    // Scan existing backups to compare after running the command
    $initialFiles = File::exists($backupDir) ? File::files($backupDir) : [];

    // Run backup:database command
    $this->artisan('backup:database')
        ->expectsOutputToContain('Respaldo creado con éxito')
        ->assertExitCode(0);

    $currentFiles = File::files($backupDir);

    // Find newly created files
    $newFiles = array_filter($currentFiles, function ($file) use ($initialFiles) {
        return ! in_array($file, $initialFiles, true) && $file->getFilename() !== '.gitignore';
    });

    expect(count($newFiles))->toBeGreaterThanOrEqual(1);

    // Verify file name structure
    $newFile = reset($newFiles);
    $filename = $newFile->getFilename();
    expect($filename)->toMatch('/^database-\d{4}-\d{2}-\d{2}_\d{2}-\d{2}-\d{2}\.sqlite$/');

    // Clean up
    File::delete($newFile->getRealPath());
});
