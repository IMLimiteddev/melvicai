<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');



Schedule::command('workflows:process')
    ->everyMinute()
    ->withoutOverlapping();


Schedule::command(
    'queue:work --stop-when-empty --tries=1 --timeout=900'
)
->everyMinute()
->withoutOverlapping();