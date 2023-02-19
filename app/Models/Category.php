<?php

namespace App\Models;

use App\Services\HelperService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_active',
        'image',
        'description',
    ];

    public static function getImageAttribute($value)
    {
        if ($value) {
            return  HelperService::getFileUrl('files/categories/', $value);
        } else {
            return url('/') . '/image-not-found.png';
        }
    }
}
