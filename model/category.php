<?php
class Category
{
    private $cat_id;
    private $cat_name;
    private $creation_date;

    public function __construct($cat_id, $cat_name, $creation_date)
    {
        $this->cat_id = $cat_id;
        $this->cat_name = $cat_name;
        $this->creation_date = $creation_date;
    }


    public function getCatId()
    {
        return $this->cat_id;
    }

    public function getCatName()
    {
        return $this->cat_name;
    }


    public function getCreationDate()
    {
        return $this->creation_date;
    }
}
