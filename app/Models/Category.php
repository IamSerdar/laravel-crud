<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function hasParent()
    {
        return $this->parent()->exists();
    }

    public function hasChildren()
    {
        return $this->children()->exists();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
