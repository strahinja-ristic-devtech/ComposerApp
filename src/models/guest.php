<?php 
namespace Acme\models;
class Guest {
  private $name;
  private $surname;

  public function __construct($name,$surname){
  	$this->name = $name;
  	$this->surname = $surname;


  }

  public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }

    return $this;
  }
}
	?>


