<?php
class Author{
    // Thuộc tính
    private $id;
    private $author_name;
    private $image; 


    public function __construct($id, $author_name, $image){
        $this->id = $id;
        $this->author_name = $author_name;
        $this->image = $image;
    }

    // Setter và Getter

    public function getId(){
        return $this->id;
    }

    public function getAuthor_Name(){
        return $this->author_name;
    }

    public function getImage(){
        return $this->image;
    }

    //set
    public function setId($id){
        $this->id = $id;
    }

    public function setAuthor_Name($author_name) {
        $this->author_name = $author_name;
      }

      public function setImage($image) {
        $this->image = $image;
      }


}