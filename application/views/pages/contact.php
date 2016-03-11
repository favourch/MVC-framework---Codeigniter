<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
 <div class="container">
 <div class="row">
  <div class="col-md-12 text-center">
<h3>LOREM IPSUM DOLOR SIT AMET</h3>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

</p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

</p>
  </div>
  <div class="panel-body">
  
  
 

	<div class="row padd20-top-btm">

		<div class="col-md-5 col-sm-5">

			<?php echo validation_errors(); ?>
			<?php echo form_open("pages/sendmsg"); ?>
				<div class="form-group">
				    <h3>Send message</h3>
					<label for="fullname">Your Name</label>
					<input type="text" name="fullname" placeholder="Full Name" id="fullname" class="form-control" required="" />
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" placeholder="Your E-mail" id="email" class="form-control" required="" />
				</div>
				</div>
		<div class="col-md-7 col-sm-7">
				<div  class="form-group">
					<label for="msg">Your message</label>
					<textarea name="msg" rows="10" cols="50" class="form-control" placeholder="Your message goes here..." required=""></textarea>
									<input type="submit" name="send-mail" class="btn btn-warning btn-block btn-lg" value="Send Message" />

				</div>
		</div>
			
		
 	</div>
 	
 	
    </div>
    </div>	<!-- panel-body ends here -->
