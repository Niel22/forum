<?php include "includes/header.php"; ?>
<?php include "config/config.php"; ?>
<?php

if (isset($_POST['submit'])) {

  if (empty($_POST['title']) || empty($_POST['author']) || empty($_POST['category']) || empty($_POST['body'])) {
    echo "<script>alert('input fields cannot be empty')</script>";
  } else {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $author = $_POST['author'];
    $category = $_POST['category'];

    $insert = $conn->prepare("INSERT INTO posts (title, body, author, category) VALUES (:title, :body, :author, :category)");
    $insert->bindParam(":title", $title);
    $insert->bindParam(":body", $body);
    $insert->bindParam(":author", $author);
    $insert->bindParam(":category", $category);

    $insert->execute();

    header("location:".APPURL."");
  }
}

?>
<div class="container">
  <div class="row">
    <!-- Main content -->
    <div style="margin-top: 57px;" class="col-lg-9 mb-3">



      <form method="POST" action="create-post.php">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Title </label>
          <input type="text" placeholder="write title" name="title" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
        </div>

        <div class="form-group mb-3">
          <label for="exampleFormControlTextarea1">Body</label>
          <textarea class="form-control" placeholder="ask your questions" name="body" rows="3"></textarea>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Post Author</label>
          <input type="text" placeholder="write author name" name="author" class="form-control"
            id="exampleInputPassword1">
        </div>


        <?php
        $selectCategory = $conn->query("SELECT * FROM categories");

        $allCategories = $selectCategory->fetchAll(PDO::FETCH_OBJ);

        ?>
        
        <select name="category" class="form-select mb-5 mt-5" aria-label="Default select example">
          <label class="form-label">Choose Category</label>

          <option selected>Choose Category</option>
          <?php foreach($allCategories as $category) :?>
          <option value="<?= $category->name;?>"><?= $category->name;?></option>
          <?php endforeach;?>
        </select>

        <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>

      </form>


    </div>

    <?php include "includes/sidebar.php"; ?>