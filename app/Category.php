<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
    ];
    protected $dates = ['deleted_at'];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
