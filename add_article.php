<?php
include 'config.php';

if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $content = $_POST['content'];
  $time = date("Y-m-d H:i:s");

  //query
  $stmt = $conn->prepare('INSERT INTO article(title,content,created_date) VALUES(:title,:content,:created_date)');
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':content', $content);
  $stmt->bindParam(':created_date', $time);

  if($stmt->execute()){
    ?>
    <script>
      alert("Successfully created new article");
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
