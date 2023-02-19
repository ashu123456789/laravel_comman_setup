<?php

namespace App\Models;

use App\Services\HelperService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'is_active',
        'image',
        'description',
    ];

    public static function getImageAttribute($value)
    {
        if ($value) {
            return  HelperService::getFileUrl('files/sub_categories/', $value);
        } else {
            return url('/') . '/image-not-found.png';
        }
    }
}
