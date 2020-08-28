<?php
include 'config.php';

if(isset($_GET['article_id'])){

  $article_id = $_GET['article_id'];
  $removed = 1;

  //query
  $stmt = $conn->prepare('UPDATE article SET removed=:removed WHERE article_id=:article_id');
  $stmt->bindParam(':removed', $removed);
  $stmt->bindParam(':article_id', $article_id);

  if($stmt->execute()){
    ?>
    <script>
      alert("Successfully deleted article");
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
