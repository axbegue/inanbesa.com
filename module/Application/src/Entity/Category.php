<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Entity\Product;
/**
 * This class represents a single post in a blog.
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category 
{  
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(name="id")   
   */
  protected $id;

  /**
   * @ORM\OneToMany(targetEntity="\Application\Entity\Product", mappedBy="category")
   * @ORM\JoinColumn(name="id", referencedColumnName="category_id")
  */
  protected $products;

  /** 
   * @ORM\Column(name="title")  
   */
  protected $title;

  /** 
   * @ORM\Column(name="slug")  
   */
  protected $slug;
  /** 
   * @ORM\Column(name="image")  
   */
  protected $image;
  /** 
   * @ORM\Column(name="thumbnail")  
   */
  protected $thumbnail;

   /**
   * Constructor.
   */
  public function __construct() 
  {
    $this->products = new ArrayCollection();               
  }

  // Returns ID of this post.
  public function getId() 
  {
    return $this->id;
  }

  // Returns title.
  public function getTitle() 
  {
    return $this->title;
  }

  // Returns slug.
  public function getSlug() 
  {
    return $this->slug;
  }

  // Returns image.
  public function getImage() 
  {
    return $this->image;
  }

  // Returns thumbnail.
  public function getThumbnail() 
  {
    return $this->thumbnail;
  }

  /**
   * Returns Products.
   * @return array
   */
  public function getProducts() 
  {
    return $this->products;
  }

}