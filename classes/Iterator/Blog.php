<?php

namespace Iterator;

use Exception;
use Traversable;

class Blog implements \IteratorAggregate
{
    private array $posts = [];
    private int $position = 0;

    public function addPost(Post $post)
    {
        array_push($this->posts, $post);
    }

    /*public function getPost()
    {
        return $this->posts;
    }

    public function current()
    {
        echo __METHOD__ . '<br>';

        return $this->posts[$this->position];
    }

    public function next()
    {
        echo __METHOD__ . '<br>';
        ++$this->position;
    }

    public function key()
    {
        echo __METHOD__ . '<br>';

        return $this->position;
    }

    public function valid()
    {
        echo __METHOD__ . '<br>';

        return isset($this->posts[$this->position]);
    }

    public function rewind()
    {
        echo __METHOD__ . '<br>';
        $this->position = 0;
    }*/

    public function getIterator()
    {
        return new \ArrayIterator($this->posts);
    }
}
