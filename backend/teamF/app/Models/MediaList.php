<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaList extends Model
{
    protected $fillable = [
        'media_kind',
        'media_name',
        'media_overview',
        'size_published',
    ];
}
