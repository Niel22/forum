<?php include "includes/header.php";?>
<?php include "config/config.php";?>
<?php

$select = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");

$allPost = $select->fetchAll(PDO::FETCH_OBJ);

?>
  <div class="container">
        <div class="row">
          <!-- Main content -->
          <div style="margin-top: 43px;" class="col-lg-9 mb-3">
            <!-- <div class="row text-left mb-5">
              
              
            </div> -->
            <!-- End of post 1 -->
            <?php foreach($allPost as $post) : ?>
            <div  class="mt-5 card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
              <div class="row align-items-center">
                <div class="col-md-8 mb-3 mb-sm-0">
                  <h5>
                    <a href="single.php?id=<?= $post->id;?>" class="text-primary"><?= $post->title;?></a>
                  </h5>
                  <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#"><?= $post->created_at;?></a> <span class="op-6"></span> <a class="text-black" href="#"><?= $post->author;?></a></p>
                  <div class="text-sm op-5"> <a class="text-black mr-2" href="#"><?= $post->category;?></a></div>
                </div>
                <div class="col-md-4 op-7">
                  <?php
                   $selectReplies = $conn->query("SELECT * FROM replies WHERE post_id = $post->id");
                   $selectReplies->execute();
                 
                   $allReplies = $selectReplies->fetchAll(PDO::FETCH_OBJ);

                  ?>
                  <div class="row text-center op-7">
                    <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm"><?= count($allReplies);?> Replys</span> </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
            <!-- /End of post 4 -->
       
          </div>
          <!-- Sidebar content -->
          <?php include "includes/sidebar.php";?>
