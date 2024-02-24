<?php include "includes/header.php"; ?>
<?php include "config/config.php"; ?>
<?php

if (isset($_GET['id'])) {
  $select = $conn->query("SELECT * FROM posts WHERE id = $_GET[id]");
  $select->execute();

  $post = $select->fetch(PDO::FETCH_OBJ);

  $selectReplies = $conn->query("SELECT * FROM replies WHERE post_id = $_GET[id]");
  $selectReplies->execute();

  $allReplies = $selectReplies->fetchAll(PDO::FETCH_OBJ);
}


if (isset($_POST['submit'])) {

  if (empty($_POST['author_name']) || empty($_POST['reply'])) {
    echo "<script>alert('input fields cannot be empty')</script>";
  } else {
    $author_name = $_POST['author_name'];
    $reply = $_POST['reply'];
    $post_id = $_POST['post_id'];

    $insert = $conn->prepare("INSERT INTO replies (author_name, reply, post_id) VALUES (:author_name, :reply, :post_id)");
    $insert->bindParam(":author_name", $author_name);
    $insert->bindParam(":reply", $reply);
    $insert->bindParam(":post_id", $post_id);

    $insert->execute();

    header("location:" . APPURL . "single.php?id=". $post->id."");
  }
}

?>
<div class="container">
  <div class="row">
    <!-- Main content -->
    <div style="margin-top: 43px;" class="col-lg-9 mb-3">

      <!-- End of post 1 -->
      <div
        class="mt-5 card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
        <div class="row align-items-center">
          <div class="col-md-12 mb-3 mb-sm-0">
            <h5>
              <a href="#" class="text-primary"><?= $post->title;?></a>
            </h5>
            <p>
            <?= $post->body;?>
            </p>
            <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#"><?= $post->created_at;?></a> <span
                class="op-6">ago by</span> <a class="text-black" href="#"><?= $post->author;?></a></p>
            <div class="text-sm op-5"> <a class="text-black mr-2" href="#"><?= $post->category;?></a></div>
          </div>

        </div>
      </div>

      <div style="margin-left: 40px;"
        class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
        <div class="row align-items-center">
          <div class="col-md-12 mb-3 mb-sm-0">
            <h5>
              <a href="#" class="text-primary">Write Comment</a>
            </h5>
            <form method="post" action="single.php?id=<?= $post->id;?>">
              <div class="form-group">
                <label for="exampleFormControlInput1">Author Name</label>
                <input type="text" name="author_name" class="form-control" id="exampleFormControlInput1"
                  placeholder="author name">
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">Reply</label>
                <textarea class="form-control" name="reply" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>

              <div class="form-group">
                <input type="hidden" name="post_id" value="<?= $post->id;?>" class="form-control" id="exampleFormControlInput1">
              </div>

              <button type="submit" name="submit" class=" mt-3 btn btn-primary w-100">Add Reply</button>
            </form>
          </div>

        </div>
      </div>

      <!-- Replies -->
      <?php foreach($allReplies as $reply) : ?>
      <div style="margin-left: 40px;"
        class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
        <div class="row align-items-center">
          <div class="col-md-12 mb-3 mb-sm-0">
            <h5>
              <a href="#" class="text-primary"><?= $reply->author_name;?></a>
            </h5>
            <p>
            <?= $reply->reply;?>
            </p>
            <p class="text-sm"><span class="op-6">Commented</span> <a class="text-black" href="#"><?= $reply->created_at;?></a></p>
          </div>

        </div>
      </div>
      <?php endforeach;?>

    </div>
    <!-- Sidebar content -->
    <?php include "includes/sidebar.php"; ?>