<?php

namespace Magenteiro\NationalLibrary\Model;

class Books {

    private array $books;

    public function __construct(array $books = []){
        $this->books = $books;
    }

    public function getBooks(){
        return $this->books;
    }
}
