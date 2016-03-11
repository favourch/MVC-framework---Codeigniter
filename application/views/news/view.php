<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
        		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                        <script>tinymce.init({ selector:'textarea' });</script>

</head>
<body>

 <div class="container">

<div class="panel panel-default">
<div class="panel-heading"><?php echo $title; ?></div>
<div class="panel-body">

   <?php
   	if(isset($is_editable))
   	{
   		?>
   		<form action="<?= base_url("news/editarticle/"); ?>" method="POST" enctype="multipart/form-data">
   			<textarea name="text" class="form-control" rows="10" cols="150"><?= $news_item["text"]; ?></textarea>
            <input type="file" name="img" size="20" />
            <?php if(file_exists("uploads/" . $news_item["img"]) && $news_item["img"] != "") { ?>
            <p><img class="img-watermark" src="<?= base_url("uploads/" . $news_item["img"]); ?>" width="320px" alt="<?php echo $news_item["title"]; ?>"/></p>
            <?php } else { ?>
            <p><img class="img-watermark" src="<?= base_url("uploads/NoImage.png"); ?>" width="320px" alt="<?php echo $news_item["title"]; ?>"/></p>
            <?php } ?>
   			<input type="hidden" name="id" value="<?= $news_item["id"]; ?>" />
   			<input type="submit" class="btn btn-warning btn-block" value="Submit" name="btn-submit" />
   		</form>
   		<?php
   	}
   	else
    {
    ?>
    <?php if(file_exists("uploads/" . $news_item["img"]) && $news_item["img"] != "") { ?>
            <p><img class="img-watermark" src="<?= base_url("uploads/" . $news_item["img"]); ?>" width="320px"  alt="<?php echo $news_item["title"]; ?>" style="display: block;" /></p>
            <?php } else { ?>
            <p><img class="img-watermark" src="<?= base_url("uploads/NoImage.png"); ?>" width="320px" alt="<?php echo $news_item["title"]; ?>" style="display: block;" /></p>
            <?php } ?>
    <?php 
   		echo $news_item["text"];
    }
   ?>
  
</div>
   










