<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 6/12/18
 * Time: 1:47 PM
 */

namespace App\Persistence\Repository;


use App\Persistence\Model\Post;
use Illuminate\Contracts\Pagination\Paginator;

class EloquentPostRepository implements PostRepository
{
    /** @var Post */
    private $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    /**
     * Return all public post paginated
     * @param $page int page number
     * @param $size int the of the page
     * @return Paginator
     */
    public function findAllPublic($page, $size)
    {
        return $this->model->query()->where(["enabled" => true])->paginate($size, ["*"], "page", $page);
    }

    /**
     * Return all posts using a paginator
     * @param $page int page number
     * @param $size int the size of the page
     * @return mixed
     */
    public function findAall($page, $size)
    {
        // TODO: Implement findAall() method.
    }

    /**
     * Return a Post given by the slug and published date
     * @param $slug string the slugified post title
     * @param $date string the date of the publish
     * @return Post
     */
    public function findBySlugAndPublishedDate($slug, $date)
    {
        // TODO: Implement findBySlugAndPublishedDate() method.
    }

    /**
     * Returns a post by its ID
     * @param $id int the post id
     * @return Post
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Returns the most viewed posts in descending order
     * @param $limit
     * @return Post[]
     */
    public function findMostViewed($limit)
    {
        // TODO: Implement findMostViewed() method.
    }

    /**
     * Return the post witch contains the search term in their title, category/tag name, or content.
     * @param $search string the term to be searched
     * @param $page int the number of page
     * @param $limit int the size of the page
     * @return Paginator
     */
    public function findBySearch($search, $page, $limit)
    {
        // TODO: Implement findBySearch() method.
    }

    /**
     * Return the posts given by the category name.
     * @param $categoryName string the name of the category
     * @param $page int current page number
     * @param $size int the size of the page
     * @return Paginator
     */
    public function findByCategory($categoryName, $page, $size)
    {
        // TODO: Implement findByCategory() method.
    }

    /**
     * Return the posts given by the tag name.
     * @param $categoryName string the name of the tag
     * @param $page int current page number
     * @param $size int the size of the page
     * @return Paginator
     */
    public function findByTag($tagName, $page, $size)
    {
        // TODO: Implement findByTag() method.
    }

    /**
     * Return the posts given by the author name.
     * @param $categoryName string the name of the author
     * @param $page int current page number
     * @param $size int the size of the page
     * @return Paginator
     */
    public function findByAuthor($authorName, $page, $size)
    {
        // TODO: Implement findByAuthor() method.
    }

    /**
     * Saves a post instance. If it is already persisted then it performs an update.
     * @param Post $post
     * @return Post
     */
    public function save(Post $post)
    {
        // TODO: Implement save() method.
    }

    /**
     * Hard deletes a post given by its ID.
     * @param $id int the post ID
     * @return void
     */
    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }
}