<?php
class Author{
    // Thuộc tính
    private $id;
    private $name;
    private $image; 


    public function __construct($id, $name, $image){
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
    }

    // Setter và Getter

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getImage(){
        return $this->image;
    }

    //set
    public function setId($id){
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
      }

      public function setImage($image) {
        $this->image = $image;
      }


}