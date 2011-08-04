<?php
/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\ProductBundle\Entity;

use Sonata\Component\Product\ProductInterface;
use Sonata\Component\Delivery\DeliveryInterface;
use Sonata\MediaBundle\Model\MediaInterface;

use Sonata\Component\Product\ProductCategoryInterface;

/**
 * Sonata\ProductBundle\Entity\BaseProduct
 */
abstract class BaseProduct implements ProductInterface
{
    /**
     * @var text $sku
     */
    protected $sku;

    /**
     * @var text $slug
     */
    protected $slug;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var text $description
     */
    protected $description;

    /**
     * @var decimal $price
     */
    protected $price;

    /**
     * @var decimal $vat
     */
    protected $vat;

    /**
     * @var integer $stock
     */
    protected $stock;

    /**
     * @var boolean $enabled
     */
    protected $enabled;

    /**
     * @var datetime $updatedAt
     */
    protected $updatedAt;

    /**
     * @var datetime $createdAt
     */
    protected $createdAt;

    protected $image;

    /**
     * @var Sonata\ProductBundle\Entity\BasePackage
     */
    protected $package;

    /**
     * @var Sonata\ProductBundle\Entity\BaseDelivery
     */
    protected $delivery;

    protected $parent;

    protected $options = array();

    protected $variations = array();

    protected $categories = array();

    /**
     * @var Application\Sonata\ProductBundle\Entity\ProductCategory
     */
    protected $productCategories;

    /**
     * Set sku
     *
     * @param text $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * Get sku
     *
     * @return text $sku
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set slug
     *
     * @param text $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return text $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param decimal $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return decimal $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set vat
     *
     * @param decimal $vat
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    /**
     * Get vat
     *
     * @return decimal $vat
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * Get stock
     *
     * @return integer $stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Get enabled
     *
     * @return boolean $enabled
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add package
     *
     * @param Sonata\ProductBundle\Entity\BasePackage $package
     */
    public function addPackage($package)
    {
        $this->package[] = $package;
    }

    /**
     * Get package
     *
     * @return Doctrine\Common\Collections\Collection $package
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Add delivery
     *
     * @param Sonata\ProductBundle\Entity\BaseDelivery $delivery
     */
    public function addDelivery(DeliveryInterface $delivery)
    {
        $this->delivery[] = $delivery;
    }

    /**
     * Get delivery
     *
     * @return Doctrine\Common\Collections\Collection $delivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }


    /**
     * @abstract
     * @return string the product name
     */
    public function getParent()
    {

        return $this->parent;
    }

    /**
     * @abstract
     * @return
     */
    public function setParent(ProductInterface $parent)
    {
        $this->parent = $parent;
    }


    /**
     * @abstract
     * @return string the product name
     */
    public function getOptions()
    {

        return $this->options;
    }

    /**
     * @abstract
     * @return
     */
    public function setOptions(array $options)
    {
        $this->$options = $options;
    }

    public function isVariation()
    {

        return $this->getParent() !== null;
    }

    /**
     * @var type $type
     */
    protected $type;

    /**
     * Set type
     *
     * @param type $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return type $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add ProductCategories
     *
     * @param Application\Sonata\ProductBundle\Entity\ProductCategory $productCategories
     */
    public function addProductCategories(ProductCategoryInterface $productCategories)
    {
        $this->productCategories[] = $productCategories;
    }

    /**
     * Get ProductCategories
     *
     * @return Doctrine\Common\Collections\Collection $productCategories
     */
    public function getProductCategories()
    {
        return $this->productCategories;
    }

    public function isEnabled()
    {
        return $this->getEnabled();
    }
    /**
     * Set image
     *
     * @param Application\Sonata\MediaBundle\Entity\Media $image
     */
    public function setImage(MediaInterface $image = null)
    {
        $this->image = $image;
    }

    /**
     * Get image
     *
     * @return Application\Sonata\MediaBundle\Entity\Media $image
     */
    public function getImage()
    {
        return $this->image;
    }

    public function setVariations($variations)
    {
        $this->variations = $variations;
    }

    public function getVariations()
    {
        return $this->variations;
    }

    public function addVariation($variation)
    {
        $this->variations[] = $variation;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function preUpdate()
    {
        $this->updatedAt = new \DateTime;
    }

    public function prePersist()
    {
        $this->createdAt = new \DateTime;
        $this->updatedAt = new \DateTime;
    }

    public function isRecurrentPayment()
    {
        return false;
    }
}