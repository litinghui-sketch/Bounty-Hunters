<?php

use Illuminate\Support\Facades\Artisan;
Artisan::command('logs:clear {--days=7}', function ($days) {
    $files = glob(storage_path('logs/*.log'));
    $count = 0;
    $cutoff = now()->subDays((int) $days);
    foreach ($files as $file) {
        if (filemtime($file) < $cutoff->timestamp) {
            unlink($file);
            $count++;
        }
    }
    $this->info("Cleared {$count} log files older than {$days} days.");
})->purpose('Clear log files older than specified days');


use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
