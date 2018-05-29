<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 5/29/18
 * Time: 10:27 AM
 */

namespace App\Persistence\Model;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = "blog_comment";
    const CREATED_AT = "date";
    const UPDATED_AT = null;

    public function parent() {
        return $this->belongsTo(Comment::class, "is_reply_to", "id", Comment::class);
    }

    public function post() {
        return $this->belongsTo(Post::class, "post_id", "id", Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class, "user_id", "id", Comment::class);
    }
}