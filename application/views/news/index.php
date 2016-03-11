<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">


    </head>
<body>

 <div class="container">
 <div class="panel panel-default">
  <div class="panel-heading"><?php echo $title; ?></div>
                 <div class="panel-body">
		  
                          <?php foreach($news as $news_item): ?>
            <div class="panel-info">
    <div class="panel-heading"><?php echo $news_item["title"]; ?></div>
            </div>
            	<p><?php echo $news_item["text"]; ?></p>
                <?php if(file_exists("uploads/" . $news_item["img"]) && $news_item["img"] != "") { ?>
                <p><img class="img-watermark" src="<?= base_url("uploads/" . $news_item["img"]); ?>" width="250" height="150" alt="<?php echo $news_item["title"]; ?>"/></p>
                <?php } else { ?>
                <p><img class="img-watermark" src="<?= base_url("uploads/NoImage.png"); ?>" width="275" height="275" alt="<?php echo $news_item["title"]; ?>"/></p>
                <?php } ?>
                <a class="btn btn-info" href="news/<?= $news_item["slug"]; ?>">View Article</a>
                <?php

					if($this->session->has_userdata("id"))
					{
               	?>
               	<a class="btn btn-warning" href="news/edit/<?= $news_item["slug"]; ?>">Edit Article</a>
                <a class="btn btn-danger" href="news/delete/<?= $news_item["id"]; ?>">Delete Article</a><br><br>
                <?php } ?>
                <?php endforeach; ?>
                </div>
