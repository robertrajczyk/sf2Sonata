<?php

namespace Polcode\ShopBundle\Entity;

class Product
{
    protected $name;

    protected $price;

    protected $category;

    protected $name_pattern = '/^en:(?P<name_en>(.*));fr:(?P<name_fr>(.*))$/i';
    /**
     * @var integer
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set en part of name
     *
     * @param string $name_en
     * @return Product
     */
    public function setNameEn($name_en)
    {
        $this->setName(sprintf("en:%s;fr:%s", $name_en, $this->getNameFr()));
    }

    /**
     * Get en part of name
     *
     * @return string 
     */
    public function getNameEn()
    {
        if(!preg_match($this->name_pattern, $this->getName(), $match))
            return null;
        else
            return $match['name_en'];
    }

    /**
     * Set en part of name
     *
     * @param string $name_fr
     * @return Product
     */
    public function setNameFr($name_fr)
    {
        $this->setName(sprintf("en:%s;fr:%s", $this->getNameEn(), $name_fr));
    }

    /**
     * Get fr part of name
     *
     * @return string 
     */
    public function getNameFr()
    {
        if(!preg_match($this->name_pattern, $this->getName(), $match))
            return null;
        else
            return $match['name_fr'];
    }
    
    /**
     * Set price
     *
     * @param string $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set category
     *
     * @param \Polcode\ShopBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\Polcode\ShopBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Polcode\ShopBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
