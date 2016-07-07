<?php

/**
 * Created by PhpStorm.
 * User: t.meier
 * Date: 29.04.2016
 * Time: 09:23
 */
class Category {
    private $id;
    /**
     * @var array
     */
    private $topCategory = [];
    /**
     * @var array
     */
    private $subCategory = [];
    /**
     * @var array
     */
    private $childCategory = [];
    /**
     * @var array
     */
    private $banner = [];
    /**
     * @var array
     */
    private $content = [];
    /**
     * @var array
     */
    private $imgFilePath = [];

    /**
     * Category constructor.
     * @param $id
     * @param array $topCategory
     * @param array $subCategory
     * @param array $childCategory
     * @param array $banner
     * @param array $content
     * @param array $imgFilePath
     */
    public function __construct($id, array $topCategory, array $subCategory, array $childCategory, array $banner, array $content, array $imgFilePath)
    {
        $this->id = $id;
        $this->topCategory = $topCategory;
        $this->subCategory = $subCategory;
        $this->childCategory = $childCategory;
        $this->banner = $banner;
        $this->content = $content;
        $this->imgFilePath = $imgFilePath;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function getTopCategory()
    {
        return $this->topCategory;
    }

    /**
     * @param array $topCategory
     */
    public function setTopCategory($topCategory)
    {
        $this->topCategory = $topCategory;
    }

    /**
     * @return array
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }

    /**
     * @param array $subCategory
     */
    public function setSubCategory($subCategory)
    {
        $this->subCategory = $subCategory;
    }

    /**
     * @return array
     */
    public function getChildCategory()
    {
        return $this->childCategory;
    }

    /**
     * @param array $childCategory
     */
    public function setChildCategory($childCategory)
    {
        $this->childCategory = $childCategory;
    }

    /**
     * @return array
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * @param array $banner
     */
    public function setBanner($banner)
    {
        $this->banner = $banner;
    }

    /**
     * @return array
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param array $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return array
     */
    public function getImgFilePath()
    {
        return $this->imgFilePath;
    }

    /**
     * @param array $imgFilePath
     */
    public function setImgFilePath($imgFilePath)
    {
        $this->imgFilePath = $imgFilePath;
    }

    

}