<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    //
    use SoftDeletes;
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name'
    ];

    public function posts(){
        $this->belongsToMany(Post::class);
    }
}
