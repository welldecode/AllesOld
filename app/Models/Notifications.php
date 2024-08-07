<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\MassPrunable;

class Notification extends Model
{
    use MassPrunable;

    public function prunable(): Builder
    {
        return static::whereNotNull('read_at')->where('read_at', '<=', now()->subWeek());
    }
}