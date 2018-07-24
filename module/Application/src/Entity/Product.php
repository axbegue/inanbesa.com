<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Entity\Image;
/**
 * This class represents a single post in a blog.
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product 
{  
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(name="id")   
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="\Application\Entity\Category", inversedBy="products")
   * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
  */
  protected $category;
  
  /**
   * @ORM\OneToMany(targetEntity="\Application\Entity\Image", mappedBy="product")
   * @ORM\JoinColumn(name="id", referencedColumnName="product_id")
  */
  protected $images;
  /** 
   * @ORM\Column(name="sku")  
   */
  protected $sku;
  /** 
   * @ORM\Column(name="title")  
   */
  protected $title;

  /** 
   * @ORM\Column(name="content")  
   */
  protected $content;

  /** 
   * @ORM\Column(name="slug")  
   */
  protected $slug;

  /** 
   * @ORM\Column(name="thumbnail")  
   */
  protected $thumbnail;

  // Returns ID of this post.
  public function getId() 
  {
    return $this->id;
  }

  // Returns title.
  public function getSku() 
  {
    return $this->sku;
  }

  // Returns title.
  public function getTitle() 
  {
    return $this->title;
  }
    
  // Returns post content.
  public function getContent() 
  {
    return $this->content; 
  }

  // Returns post content.
  public function getSlug() 
  {
    return $this->slug; 
  }
  // Returns post thumbnail.
  public function getThumbnail() 
  {
    return $this->thumbnail; 
  }
  /*
   * Returns associated post.
   * @return \Application\Entity\Category
   */
  public function getCategory() 
  {
    return $this->category;
  }

  /**
   * Returns comments for this post.
   * @return array
   */
  public function getImages() 
  {
    return $this->images;
  }
}