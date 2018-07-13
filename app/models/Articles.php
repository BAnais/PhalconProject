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

  /**
   *
   */
  function getArticleTitle()
  {
    return $this->$Title;
  }
  /**
   *
   */
  function setTitleArticle($setTitle)
  {
    if(empty($setTitle)){
      throw new InvalidArgumentException("Invalid new Title", 1);
    }
    $this->$Title = $setTitle;
  }
  /**
   *
   */
  function getSummaryArticle()
  {
    return $this->$Summary;
  }
  /**
   *
   */
  function setSummaryArticle($setSummary)
  {
    if(empty($setSummary)){
      throw new InvalidArgumentException("Invalid new Summary", 1);
    }
    $this->$Summary = $setSummary;
  }
  /**
   *
   */
  function getArticleContent()
  {
    return $this->$Content;
  }
  /**
   *
   */
  function setArticleContent($setContent)
  {
    if(empty($setContent)){
      throw new InvalidArgumentException("Invalid new Content", 1);
    }
    $this->$Content = $setContent;
  }
  /**
   *
   */
  function PublicationDate()
  {
    return $this->$publicationDate;
  }
  /**
   *
   */
  function PublicationDate($setPublicationDate)
  {
    if(empty($setPublicationDate)){
      throw new InvalidArgumentException("Invalid new Publication Date", 1);
    }
    $this->$publicationDate = $setPublicationDate;
  }
}




 ?>
