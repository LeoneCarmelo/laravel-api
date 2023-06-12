<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Technology extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'link_img', 'slug', 'project_id'];
    
    public function project(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
}
