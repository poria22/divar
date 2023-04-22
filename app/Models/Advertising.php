<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'content',
        'banner',
        'user_id',
        'category_id',
        'price',
        'Condition'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getbanner()
    {
        return asset('images/banner/'.$this->banner);
    }

    public function jalali()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function Condition()
    {
        if (isset($this->Condition)){
            if ($this->Condition == '0'){
                return 'رد شده';
            }else return 'تایید شده';
        }else return 'درانتظار بررسی';
    }
}
