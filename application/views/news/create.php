<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
			<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                        <script>tinymce.init({ selector:'textarea' });</script>


 <div class="container">
 <div class="panel panel-default">
  <div class="panel-heading"><?php echo $title; ?></div>
  <div class="panel-body">
 
     <?php echo form_open_multipart("news/create"); ?>
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" id="title" name="title" class="form-control" name="title" /><br />
		</div>
		<div class="form-group">
			<label for="text">Text</label>
			<textarea name="text" id="text" class="form-control" rows="5"></textarea><br />
		</div>
        <div class="form-group">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <span class="btn btn-default btn-file">
                    <span class="fileinput-new">Select image file</span>
                    <span class="fileinput fileinput-exists">Change</span>
                    <input type="file" class="form-control" name="img" />
                </span>
                <span class="fileinput-filename"></span>
                <a class="close fileinput-exists" href="" data-dismiss="fileinput" style="float: none;">&times;</a>
            </div>
        </div>
		
		<input type="submit" name="submit" class="btn btn-info" value="Create news item" /> 
 </div>