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
        $query = "SELECT * FROM article";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $ArticlesData = $stmt->fetchAll();
        $articles = array();

        foreach ($ArticlesData as $ArticleData) {
            $articles[] = new Category(
                $ArticleData["article_id"],
                $ArticleData["article_name"],
                $ArticleData["creation_date"],
                $ArticleData["image"],
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
        $query = "INSERT INTO article (article_name, creation_date, image, article_main, archived, fk_cat, fk_email) VALUES (:article_name, :creation_date, :image, :article_main, :archived, :fk_cat, :fk_email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_name', $article->getArticleName());
        $stmt->bindParam(':creation_date', $article->getCreationDateArticle());
        $stmt->bindParam(':image', $article->getImage());
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
            return new Article($result['article_id'], $result['article_name'], $result['creation_date'],$result['image'],$result['article_main'], $result['archived'], $result['fk_cat'],$result['fk_email']);
        } else {
            return null;
        }
    }


    public function updateArticle(Article $article)
    {
        $query = "UPDATE category SET article_name = :article_name, creation_date = :creation_date, image = :image, article_main = :article_main, archived = :archived, fk_cat = :fk_cat, fk_email = :fk_email WHERE article_id = :article_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':cat_name', $article->getArticleName());
        $stmt->bindParam(':creation_date', $article->getCreationDateArticle());
        $stmt->bindParam(':cat_id', $article->getImage());
        $stmt->bindParam(':cat_name', $article->getArticleMain());
        $stmt->bindParam(':creation_date', $article->getArchived());
        $stmt->bindParam(':creation_date', $article->getFKCategory());
        $stmt->bindParam(':creation_date', $article->getFKEmail());
        $stmt->bindParam(':cat_id', $article->getArticleId());
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
        $query = "SELECT * FROM article WHERE article_id = :article_id ORDER BY DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':article_id', $article_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new Article($result['article_id'], $result['article_name'], $result['creation_date'],$result['image'],$result['article_main'], $result['archived'], $result['fk_cat'],$result['fk_email']);
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
}
?>