<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Type;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'image', 'description'];

    public static function generateSlug($title) 
    {
        return Str::slug($title, '-');
    }
    //every project belongs to 1 type
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
