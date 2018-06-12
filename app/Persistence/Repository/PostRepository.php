<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 6/12/18
 * Time: 11:09 AM
 */

namespace App\Persistence\Repository;
use App\Persistence\Model\Post;
use Illuminate\Contracts\Pagination\Paginator;

/**
 * Repository for accessing Post entities.
 * Interface PostRepository
 * @package App\Persistence\Repository
 */
interface PostRepository
{
    /**
     * Return all public post paginated
     * @param $page int page number
     * @param $size int the of the page
     * @return Paginator
     */
    public function findAllPublic($page, $size);

    /**
     * Return all posts using a paginator
     * @param $page int page number
     * @param $size int the size of the page
     * @return mixed
     */
    public function findAall($page, $size);

    /**
     * Return a Post given by the slug and published date
     * @param $slug string the slugified post title
     * @param $date string the date of the publish
     * @return Post
     */
    public function findBySlugAndPublishedDate($slug, $date);

    /**
     * Returns a post by its ID
     * @param $id int the post id
     * @return Post
     */
    public function findById($id);

    /**
     * Returns the most viewed posts in descending order
     * @param $limit
     * @return Post[]
     */
    public function findMostViewed($limit);

    /**
     * Return the post witch contains the search term in their title, category/tag name, or content.
     * @param $search string the term to be searched
     * @param $page int the number of page
     * @param $limit int the size of the page
     * @return Paginator
     */
    public function findBySearch($search, $page, $limit);

    /**
     * Return the posts given by the category name.
     * @param $categoryName string the name of the category
     * @param $page int current page number
     * @param $size int the size of the page
     * @return Paginator
     */
    public function findByCategory($categoryName, $page, $size);

    /**
     * Return the posts given by the tag name.
     * @param $categoryName string the name of the tag
     * @param $page int current page number
     * @param $size int the size of the page
     * @return Paginator
     */
    public function findByTag($tagName, $page, $size);

    /**
     * Return the posts given by the author name.
     * @param $categoryName string the name of the author
     * @param $page int current page number
     * @param $size int the size of the page
     * @return Paginator
     */
    public function findByAuthor($authorName, $page, $size);

    /**
     * Saves a post instance. If it is already persisted then it performs an update.
     * @param Post $post
     * @return Post
     */
    public function save(Post $post);

    /**
     * Hard deletes a post given by its ID.
     * @param $id int the post ID
     * @return void
     */
    public function deleteById($id);
}