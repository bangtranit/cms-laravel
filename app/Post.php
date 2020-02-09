<?php

namespace App;

use App\User;
use App\Tag;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    //
    /**
     * use soft delete
     */
    use SoftDeletes;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'published_at',
        'user_id',
        'category_id',
    ];
    protected $dates = ['deleted_at'];

    /**
     * Delete image after update image
     */
    public function deleteImage(){
        Storage::delete($this->image);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    /*check if has tag
     *
     */
    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function scopeSearched($query){
        $keyword = request()->query('keyword');
        if (!$keyword){
            return $query;
        }
        return $query->where('title', 'LIKE', "%{$keyword}%");
    }
}
