<?php

$select = $conn->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 0, 4");

$allPost = $select->fetchAll(PDO::FETCH_OBJ);

$selectCategory = $conn->query("SELECT count(*) AS category FROM categories");

$allCategories = $selectCategory->fetch(PDO::FETCH_OBJ);

$selectReply = $conn->query("SELECT count(*) AS reply FROM replies");

$allReplies = $selectReply->fetch(PDO::FETCH_OBJ);

?>
<div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
  <div
    style="visibility: hidden; display: none; width: 285px; height: 801px; margin: 0px; float: none; position: static; inset: 85px auto auto;">
  </div>
  <div
    data-settings="{&quot;parent&quot;:&quot;#content&quot;,&quot;mind&quot;:&quot;#header&quot;,&quot;top&quot;:10,&quot;breakpoint&quot;:992}"
    data-toggle="sticky" class="sticky" style="top: 85px;">
    <div class="sticky-inner">
      <a class="btn btn-lg btn-block btn-success rounded-0 py-4 mb-3 bg-op-6 roboto-bold"
        href="<?= APPURL ?>create-post.php">Ask Question</a>
      <div class="bg-white mb-3">
        <h4 class="px-3 py-4 op-5 m-0">
          Latest Posts
        </h4>
        <hr class="m-0">
        <?php foreach ($allPost as $post): ?>
          <div class="pos-relative px-3 py-3">
            <h6 class="text-primary text-sm">
              <a href="single.php?id=<?= $post->id; ?>" class="text-primary">
                <?= $post->title; ?>
              </a>
            </h6>
            <p class="mb-0 text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">
                <?= $post->created_at; ?>
              </a> <span class="op-6"></span> <a class="text-black" href="#">
                <?= $post->author; ?>
              </a></p>
          </div>
        <?php endforeach; ?>
        <div class="bg-white text-sm">
          <h4 class="px-3 py-4 op-5 m-0 roboto-bold">
            Stats
          </h4>
          <hr class="my-0">
          <div class="row text-center d-flex flex-row op-7 mx-0">
            <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a
                class="d-block lead font-weight-bold" href="#"><?= $allCategories->category;?></a> Categories </div>
            <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a
                class="d-block lead font-weight-bold" href="#"><?= count($allPost);?></a> Posts </div>
          </div>
          <div class="row d-flex flex-row op-7">
            <div class="col-sm-6 flex-ew text-center py-3 border-right mx-0"> <a class="d-block lead font-weight-bold"
                href="#"><?= $allReplies->reply;?></a> Replies </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>

</html>