<?php
namespace Blog\Model;

class Post
{
    public $id;
    public $title;
    public $content;
    public $create_at;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->title  = (isset($data['title'])) ? $data['title'] : null;
        $this->content = (isset($data['content'])) ? $data['content'] : null;
        $this->create_at = (isset($data['content_at'])) ? $data['content_at'] : null;
        
    }
}
