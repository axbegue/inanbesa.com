<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * This class represents a single post in a blog.
 * @ORM\Entity
 * @ORM\Table(name="image")
 */
class Image 
{  
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(name="id")   
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="\Application\Entity\Product", inversedBy="images")
   * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
   */
  protected $product;

  /** 
   * @ORM\Column(name="url")  
   */
  protected $url;


  // Returns ID of this post.
  public function getId() 
  {
    return $this->id;
  }

  // Returns title.
  public function getUrl() 
  {
    return $this->url;
  }

  /*
   * Returns associated post.
   * @return \Application\Entity\Product
   */
  public function getProduct() 
  {
    return $this->product;
  }
}