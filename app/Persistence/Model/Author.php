<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 5/29/18
 * Time: 10:01 AM
 */

namespace App\Persistence\Model;


use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $table = "blog_author";
    public $timestamp = null;

    public function posts() {
        return $this->hasMany(Post::class, "author_id", "id");
    }
}