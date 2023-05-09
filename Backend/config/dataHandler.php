<?php
include("models/book.php");
class DataHandler{
    public function getAllBooks()
    {
        require("db_getAllBooks.php");
        $result = array();
        foreach ($res as $line)
        {
            array_push($result, new book(
                $line["pr_id"],
                $line["title"],
            ));
        }
        return $result;
    }
}