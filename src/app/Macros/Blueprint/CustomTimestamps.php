<?php

namespace App\Macros\Blueprint;

use Closure;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class CustomTimestamps
{
    public function __invoke(): Closure
    {
        return function ($precision = 0) {
            /** @var Blueprint $this */
            $this->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->nullable(false);
            $this->timestamp('updated_at');
        };
    }
}
