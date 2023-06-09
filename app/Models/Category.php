<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'link',
        'user_id',
        'category_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function parentname()
    {
        return is_null($this->parent)?'ندارد' :$this->parent->name;
    }

    public function children()
    {
        return $this->hasMany(Category::class);
    }
}
