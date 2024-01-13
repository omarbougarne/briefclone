<?php
class Tag
{
    private $tag_name;

    public function __construct($tag_name)
    {
        $this->tag_name = $tag_name;
    }


    public function getTagName()
    {
        return $this->tag_name;
    }
}

?>