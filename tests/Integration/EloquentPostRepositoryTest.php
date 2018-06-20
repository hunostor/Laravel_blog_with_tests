<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 6/12/18
 * Time: 1:48 PM
 */

namespace Tests\Integration;

use App\Persistence\Model\Author;
use App\Persistence\Model\Post;
use App\Persistence\Repository\EloquentPostRepository;
use App\Persistence\Repository\PostRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EloquentPostRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    private $underTest;

    /**
     * @var PostRepository
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->underTest = new EloquentPostRepository(new Post);
        parent::__construct();
    }

    /**
     * @test
     */
    public function findById_should_return_post_by_id() {
        // GIVEN
        $id = 5;
        $title = "test";
        $enabled = true;
        $this->createPost($id, $title, $enabled);
        // WHEN
        $actual = $this->underTest->findById($id);
        // THEN
        $this->assertEquals($actual->title, $title);
    }

    /**
     * @test
     */
    public function findById_should_return_post_by_id_regardless_enabled() {
        // GIVEN
        $id = 5;
        $title = "test";
        $enabled = false;
        $this->createPost($id, $title, $enabled);
        // WHEN
        $actual = $this->underTest->findById($id);
        // THEN
        $this->assertEquals($actual->title, $title);
    }

    /**
     * @param $id
     * @param $title
     * @param $enabled
     */
    private function createPost($id, $title, $enabled): void
    {
        $post = factory(Post::class)->make(["id" => $id, "title" => $title, "enabled" => $enabled]);
        $author = factory(Author::class)->create();
        $post->author()->associate($author);
        $post->save();
    }

    /**
     * @test
     */
    public function findAllPublic_should_return_filled_paginator_when_got_enabled_posts() {
        // GIVEN
        $number = 20;
        $enabled = true;
        $this->createPosts($number, $enabled);
        // WHEN
        $actual = $this->underTest->findAllPublic(1, 10);
        // THEN
        $this->assertEquals($actual->isEmpty(), false);
        $this->assertEquals($actual->currentPage(), 1);
        $this->assertEquals($actual->hasPages(), true);
        $this->assertEquals(count($actual->items()), 10);
    }

    /**
     * @test
     */
    public function findAllPublic_should_return_empty_paginator_when_got_no_enabled_posts() {
        // GIVEN
        $number = 20;
        $enabled = false;
        $this->createPosts($number, $enabled);
        // WHEN
        $actual = $this->underTest->findAllPublic(1, 10);
        // THEN
        $this->assertEquals($actual->isEmpty(), true);
        $this->assertEquals($actual->hasPages(), false);
        $this->assertEquals($actual->currentPage(), 1);
        $this->assertEquals(count($actual->items()), 0);
    }

    /**
     * @param $number
     * @param $enabled
     */
    private function createPosts($number, $enabled): void
    {
        $author = factory(Author::class)->create();
        factory(Post::class, $number)->make(["enabled" => $enabled])->each(function (Post $post) use ($author) {
            $post->author()->associate($author);
            $post->save();
        });
    }
}