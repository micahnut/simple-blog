<?php
include 'config.php';
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
      <a class="btn btn-success" href="add.php">Create New Article</a>

      <?php
        $stmt = $conn->prepare('SELECT * FROM article WHERE removed = 0 ORDER BY article_id DESC');
        $stmt->execute();

        if($row=$stmt->rowCount() > 0){
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            ?>

            <div class="article-entry mt-3">
              <a href="view_article.php?article_id=<?php echo $row['article_id'];?>"><h4><?php echo $row['title'];?></h4></a>
              <p><?php echo $row['created_date'];?></p>
              <p><?php $snippet = myTruncate( $row['content'], 10);?></p>
              <p><?php echo $snippet;?></p>

              <div class="row">
                <div class="col-md-12">
                <a class="btn btn-primary" href="edit.php?article_id=<?php echo $row['article_id'];?>">Edit</a>
                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article');" href="delete.php?article_id=<?php echo $row['article_id'];?>">Delete</a>
                </div>
              </div>
            </div>
            <hr>
            <?php
          }
        }
      ?>
    </div>
  </div>

</div>

<?php
function myTruncate($string, $limit, $break=".", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}
?>
</body>
</html>
