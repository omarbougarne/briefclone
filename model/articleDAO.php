<?php
require_once  'connexion.php';
require_once 'article.php';
class ArticleDAO
{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function getArticles()
    {
        $query= "SELECT * FROM article";
        // $query = "SELECT article.*,tag.tag_name 
        // FROM article
        // INNER JOIN article_tag ON article.article_id = article_tag.article_id
        // INNER JOIN tag ON article_tag.tag_name = tag.tag_name";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $ArticlesData = $stmt->fetchAll();
        $articles = array();

        foreach ($ArticlesData as $ArticleData) {
            $articles[] = new Article(
                $ArticleData["article_id"],
                $ArticleData["article_name"],
                $ArticleData["creation_date"],
                $ArticleData["article_main"],
                $ArticleData["archived"],
                $ArticleData["fk_cat"],
                $ArticleData["fk_email"]
                
            );
        
        }

        return $articles;
    }
    public function addArticle($article)
    {
        $query = "INSERT INTO article (article_name, creation_date, article_main, archived, fk_cat, fk_email) VALUES (:article_name, :creation_date, :image, :article_main, :archived, :fk_cat, :fk_email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_name', $article->getArticleName());
        $stmt->bindParam(':creation_date', $article->getCreationDateArticle());
        $stmt->bindParam(':article_main', $article->getArticleMain());
        $stmt->bindParam(':archived', $article->getArchived());
        $stmt->bindParam(':fk_cat', $article->getFKCategory());
        $stmt->bindParam(':fk_email', $article->getFKEmail());
        $stmt->execute();
    }


    public function getArticleById($article_id)
    {
        $query = "SELECT * FROM article WHERE article_id = :article_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_id', $article_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new Article($result['article_id'], $result['article_name'], $result['creation_date'],$result['article_main'], $result['archived'], $result['fk_cat'],$result['fk_email']);
        } else {
            return null;
        }
    }


    public function updateArticle(Article $article)
    {
        $query = "UPDATE category SET article_name = :article_name, creation_date = :creation_date, article_main = :article_main, archived = :archived, fk_cat = :fk_cat, fk_email = :fk_email WHERE article_id = :article_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_name', $article->getArticleName());
        $stmt->bindParam(':creation_date', $article->getCreationDateArticle());
        $stmt->bindParam(':article_main', $article->getArticleMain());
        $stmt->bindParam(':archived', $article->getArchived());
        $stmt->bindParam(':fk_cat', $article->getFKCategory());
        $stmt->bindParam(':fk_email', $article->getFKEmail());
        $stmt->bindParam(':article_id', $article->getArticleId());
        $stmt->execute();
    }


    public function deleteCategory($article_id)
    {
        $query = "DELETE FROM article WHERE article_id = :article_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_id', $article_id);
        $stmt->execute();
    }
    public function getLatestArticle($article_id)
    {
        $query = "SELECT * FROM article  ORDER BY article_id = :article_id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_id', $article_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new Article($result['article_id'], $result['article_name'], $result['creation_date'],$result['article_main'], $result['archived'], $result['fk_cat'],$result['fk_email']);
        } else {
            return null;
        }
    }
    public function getArchive($article_id)
    {
        $query = "UPDATE article SET archived = 0 WHERE article_id = :article_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_id', $article_id);
        $stmt->execute();
    }
    function getAjax($query){
    $name = '%$query%';

    $sql = "SELECT * FROM article WHERE name LIKE :article_name";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':article_name', $name);
    $result = $stmt->fetchAll();
    $stmt->execute();
    return $result;


 
    }

}
?>