<?php
namespace HomePage;

use InvalidArgumentException;
use Phalcon\Mvc\Model;

/**
 *
 */
class Users extends Model
{
  protected $name;
  protected $password;
  protected $isAdmin;

  public function __get($property)
  {
    if(property_exists($this, $property)){
      return $this->$property;
    }
  }
  public function __set($property, $value)
  {
    if(property_exists($this, $property)){
      $this->$property = $value;
    }
    return $this;
  }
}
?>
