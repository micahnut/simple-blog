<?php
include 'config.php';

if(isset($_GET['article_id'])){
  $article_id = $_GET['article_id'];
  $stmt = $conn->prepare('SELECT * FROM article WHERE article_id=:article_id');
  $stmt->execute(array(':article_id'=>$article_id));
  $full_article = $stmt->fetch(PDO::FETCH_ASSOC);
  extract($full_article);
  //row = $stmt->fetch(PDO::FETCH_ASSOC
}else{
  header("Location: index.php");
}
?>

<html>
<head>
  <title>Simple Bulletin Board</title>
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Simple Bulletin Board</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>

  </div>
</nav>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4>Edit Article</h4>
      <form method="POST" action="edit_article.php">
        <input name="article_id" id="article_id" value="<?php echo $full_article['article_id']?>" type="hidden">
        <div class="form-group">
          <input class="form-control" value="<?php echo $full_article['title']?>" type="text" name="title" id="title" placeholder="Title" requred>

        <div>
        <div class="form-group">
          <textarea name="content" id="content" class="form-control" placeholder="Content" required><?php echo $full_article['content']?></textarea>
        </div>
        <button type="submit" class="btn btn-success" name="submit">Update</button>

      </form>

    </div>
  </div>

</div>

</body>
</html>
