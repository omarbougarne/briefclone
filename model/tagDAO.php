<?php
require_once 'tag.php';
class TagDAO
{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function getTags()
    {
        $query = "SELECT * FROM tag";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $tagsData = $stmt->fetchAll();
        $tags = array();

        foreach ($tagsData as $tagData) {
            $tags[] = new Tag(
                $tagData["tag_name"]
            );
        }

        return $tags;
    }
    public function addTag(Tag $tag)
    {
        $query = "INSERT INTO tag (tag_name) VALUES (:tag_name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tag_name', $tag->getTagName());
        $stmt->execute();
    }


    public function getTagByName($tag_name)
    {
        $query = "SELECT * FROM tag WHERE tag_name = :tag_name";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tag_name', $tag_name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new Tag($result['tag_name']);
        } else {
            return null;
        }
    }


    public function updateTag($tag)
    {
        $query = "UPDATE tag SET tag_name = :tag_name WHERE tag_name = :tag_name";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tag_name', $tag->getTagName());
        $stmt->execute();
    }


    public function deleteTag($tag_name)
    {
        $query = "DELETE FROM tag WHERE tag_name = :tag_name";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tag_name', $tag_name);
        $stmt->execute();
    }
    public function gettags_ALL_by_wikiID($id){
        $query = "SELECT * FROM article_tag WHERE article_id = :article_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(':article_id', $id, PDO::PARAM_INT);
        $stmt -> execute();
        $tags = $stmt->fetchAll();

        return $tags;
    }
}

?>