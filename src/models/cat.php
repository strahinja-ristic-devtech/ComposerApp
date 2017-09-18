<?php 
namespace Acme\models;
	Class Cat {
		private $nickname;

		public function __construct($nickname){

			$this->nickname = $nickname;
			
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

		static function says() {echo 'feed me human';}



	}

	?>
	