<?php

namespace App\Models;

use App\SOLID\Traits\FileTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use FileTraits;

    protected $table = 'posts';

    protected $guarded = [];

    public function user(){
       return $this->belongsTo(User::class,'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function share(){
        return $this->hasMany(Share::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }

    public function setMediaAttribute($value){
        $this->attributes['media'] = $this->uploadFile($value,'uploads/posts');
    }
}
