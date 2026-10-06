<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command("inspire", function (): void {
    $this->comment("Build knowledge, share impact.");
})->purpose("Display an inspiring message");
