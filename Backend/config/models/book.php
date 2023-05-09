<?php
class book{
    public $book_id
    public $title
    
    function __construct($book_id, $title){
        $this->book_id = $book_id;
        $this->title = $title;
    }
}