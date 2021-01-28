<?php

namespace Prototype;

class Post implements IPost
{
    private $title, $text;

    private $user;
    private $comment = [];
    private $created_at;

    public function __construct($user, $title, $text)
    {
        $this->user = $user;
        $this->title = $title;
        $this->text = $text;
        $this->created_at = new \DateTime();

        $this->user->addPost($this);
    }

    public function addComment($comment)
    {
        $this->comment[] = $comment;
    }

    public function __clone()
    {
        $this->title = $this->title . 'New Post';
        $this->user->addPost($this);
        $this->comment = [];
        $this->created_at = new \DateTime();
    }
}
