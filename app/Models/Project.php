<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Type;
use App\Models\Technology;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'image', 'description', 'link_project', 'link_website', 'type_id', 'technology_id'];

    public static function generateSlug($title) 
    {
        return Str::slug($title, '-');
    }
    //every project belongs to 1 type
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }
}
