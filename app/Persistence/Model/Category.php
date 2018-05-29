<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 5/29/18
 * Time: 10:03 AM
 */

namespace App\Persistence\Model;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "blog_category";
    const UPDATED_AT = null;

    public function post() {
        return $this->belongsToMany(
            Post::class,
            "blog_post_to_category",
            "category_id",
            "post_id",
            Category::class
        );
    }

}