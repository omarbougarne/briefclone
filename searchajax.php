<?php
$name = $_POST['name']; 

$sql = "SELECT * FROM article WHERE name LIKE :article_name";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name . '%', PDO::PARAM_STR);
$stmt->execute();

$data = '';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data .= "<tr><td>" . $row['id'] . "</td><td>" . $row['article_name'] . "</td><td>" . $row['email'] . "</td></tr>";
}

echo $data;
?>
