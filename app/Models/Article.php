<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;

    protected  $fillable = ['title', 'excerpt', 'body'];
    /**
     * @var mixed
     */
    private $user_id,$title;

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('id', $value)->orWhere('title', $value)->firstOrFail();

    }

    public function path()
    {
        return route('articles.show', $this);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }


}
