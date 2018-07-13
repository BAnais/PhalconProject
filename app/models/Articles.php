<?php
namespace HomePage;

use InvalidArgumentException;
use Phalcon\Mvc\Model;

/**
 *
 */
class Articles extends Model
{
  protected $Title;
  protected $Summary;
  protected $Content;
  protected $publicationDate;

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
