<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public static function invisible()
    {
        $donation = Content::find(4);
        return $donation->visibility == 'hide';
    }

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

    public function hasPicture($section): bool
    {
        return $section == 'slider' || $section == 'picture title';
    }
}
