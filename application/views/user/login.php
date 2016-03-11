<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading"><?php echo $title; ?></div>
		<div class="panel-body">

			<p><?php echo $msg; ?></p>
			<?php echo validation_errors(); ?>
			<?php echo form_open("user/dologin"); ?>

				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" placeholder="Username" class="form-control" value="<?php echo set_value('username'); ?>" />
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" placeholder="Password" class="form-control" value="<?php echo set_value('password'); ?>" />
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" name="remember_me" /> Remember Me
					</label>
				</div>
				<input type="submit" value="LOGIN" class="btn btn-primary" />
			</form>
		</div>

   