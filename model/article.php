<?php
class Article
{
    private $article_id;
    private $article_name;
    private $creation_date;
    private $image;
    private $article_main;
    private $archived;
    private $fk_cat;
    private $fk_email;

    public function __construct($article_id,$article_name,
    $creation_date,
    $image,
    $article_main,
    $archived,
    $fk_cat,
    $fk_email)
    {
        $this->article_id = $article_id;
        $this->article_name = $article_name;
        $this->creation_date = $creation_date;
        $this->image = $image;
        $this->article_main = $article_main;
        $this->archived = $archived;
        $this->fk_cat = $fk_cat;
        $this->fk_email = $fk_email;
    }


    public function getArticleId()
    {
        return $this->article_id;
    }

    public function getArticleName()
    {
        return $this->article_name;
    }


    public function getCreationDateArticle()
    {
        return $this->creation_date;
    }
    public function getImage()
    {
        return $this->image;
    }

    public function getArticleMain()
    {
        return $this->article_main;
    }


    public function getArchived()
    {
        return $this->archived;
    }
    public function getFKCategory()
    {
        return $this->fk_cat;
    }
    public function getFKEmail()
    {
        return $this->fk_email;
    }
}