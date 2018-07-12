<?php
namespace HomePage;

use InvalidArgumentException;
use Phalcon\Mvc\Model;

/**
 *
 */
class Articles extends Model
{
  protected $articleTitle;
  protected $articleSummary;
  protected $articleContent;
  protected $publicationDate;

  /**
   *
   */
  function getArticleTitle()
  {
    return $this->$articleTitle;
  }
  /**
   *
   */
  function setTitleArticle($setTitle)
  {
    if(empty($setTitle)){
      throw new InvalidArgumentException("Invalid new Title", 1);
    }
    $this->$articleTitle = $setTitle;
  }
  /**
   *
   */
  function getSummaryArticle()
  {
    return $this->$articleSummary;
  }
  /**
   *
   */
  function setSummaryArticle($setSummary)
  {
    if(empty($setSummary)){
      throw new InvalidArgumentException("Invalid new Summary", 1);
    }
    $this->$articleSummary = $setSummary;
  }
  /**
   *
   */
  function getArticleContent()
  {
    return $this->$articleContent;
  }
  /**
   *
   */
  function setArticleContent($setContent)
  {
    if(empty($setContent)){
      throw new InvalidArgumentException("Invalid new Content", 1);
    }
    $this->$articleContent = $setContent;
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
