<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use App\Macros\Blueprint\CustomTimestamps;

class MacroServiceProvider extends ServiceProvider
{
    public function boot(): void {
        Blueprint::macro('customTimestamps', app(CustomTimestamps::class)());
    }
}
