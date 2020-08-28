<?php
include 'config.php';

if(isset($_GET['article_id'])){

  $article_id = $_GET['article_id'];

  //query
  //  $stmt = $conn->prepare('SELECT * FROM article WHERE removed = 0 ORDER BY article_id DESC');
    // $stmt->execute();
  $stmt = $conn->prepare("UPDATE article SET votes = votes-1 WHERE article_id = $article_id");

  if($stmt->execute()){
    ?>
    <script>

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const article_id = urlParams.get('article_id');
    console.log(article_id);

    alert("Successfully downvoted article");
    window.location.href=('view_article.php?article_id='+article_id+'');


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
