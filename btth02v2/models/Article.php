<?php
class Article{
    // Thuộc tính
    private $id;
    private $title;
    private $name;
    private $summary;
    private $content;
    private $cat_name;
    private $cat_id;
    
    private $au_name;
    private $au_id;
    private $date;
    private $image;


    public function __construct($id,$title,$name, $summary,$content,$cat_name,$cat_id,$au_name,$au_id,$date,$image){
        $this->id = $id;
        $this->title = $title;
        $this->name = $name;
        $this->summary = $summary;
        $this->content = $content;
        $this->cat_name = $cat_name;
        $this->cat_id = $cat_id;
        $this->au_name = $au_name;
        $this->au_id = $au_id;
        $this->date = $date;
        $this->image = $image;
    }

    // Setter và Getter
    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getName(){
        return $this->name;
    }
    public function getSummary(){
        return $this->summary;
    }
    public function getContent(){
        return $this->content;
    }
    public function getCat_name(){
        return $this->cat_name;
    }
    public function getCat_id(){
        return $this->cat_id;
    }
    public function getAu_name(){
        return $this->au_name;
    }
    public function getAu_id(){
        return $this->au_id;
    }
    public function getDate(){
        return $this->date;
    }
    public function getImage(){
        return $this->image;
    }
    public function setId( $id) {
		$this->id = $id;
	}
	public function setTitle( $title) {
		$this->title = $title;
	}
	public function setName( $name) {
		$this->name = $name;
	}
	public function setSummary( $summary) {
		$this->summary = $summary;
	}
	public function setContent( $content) {
		$this->content = $content;
	}
	public function setCat_name( $cat_name) {
		$this->cat_name = $cat_name;
	}
	public function setAu_name( $au_name) {
		$this->au_name = $au_name;
	}
	public function setDate( $date) {
		$this->date = $date;
	}
	public function setImage( $image) {
		$this->image = $image;
	}

}