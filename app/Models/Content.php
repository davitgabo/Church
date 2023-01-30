<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public function isDeletable($section): bool
    {
        $qty = Content::where('section', 'slider')->count();
        return $qty > 1 && $section == 'slider';
    }

    public function isStorable(): bool
    {
        $qty = Content::where('section', 'slider')->count();
        return $qty < 6;
    }
}
