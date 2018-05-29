<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 5/29/18
 * Time: 10:06 AM
 */

namespace App\Persistence\Model;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $table = "blog_tag";
    public $timestamps = null;

    public function posts() {
        return $this->belongsTo(Post::class, "post_id", "id", Tag::class);
    }
}