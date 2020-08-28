<?php
include 'config.php';

if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $content = $_POST['content'];
  $article_id = $_POST['article_id'];

  //query
  $stmt = $conn->prepare('UPDATE article SET title=:title, content=:content WHERE article_id=:article_id');
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':content', $content);
  $stmt->bindParam(':article_id', $article_id);

  if($stmt->execute()){
    ?>
    <script>
      alert("Successfully edited article");
      window.location.href=('index.php');

    </script>
    <?php
  }else{
    ?>
    <script>
      alert("error");
      window.location.href=('index.php');

    </script>
    <?php
  }
}



?>
