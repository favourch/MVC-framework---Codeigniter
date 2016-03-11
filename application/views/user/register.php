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
			<?php echo form_open("user/doregister"); ?>
				<div class="form-group">
					<label for="fullname">Full Name</label>
					<input type="text" name="fullname" placeholder="Full Name" id="fullname" class="form-control" value="<?php echo set_value('fullname'); ?>" required />
				</div>
				<div class="form-group">
					<label for="username" >Username</label>
					<input type="text" name="username" placeholder="Username" id="username" class="form-control" value="<?php echo set_value('username'); ?>" required />
				</div>
				<div class="form-group">
					<label for="password" required>Password</label>
					<input type="password" name="password" placeholder="Password" id="password" class="form-control" value="<?php echo set_value('password'); ?>" required />
				</div>
				<div class="form-group">
					<label for="email" >Email</label>
					<input type="email" name="email" placeholder="Email" id="email" class="form-control" value="<?php echo set_value('email'); ?>" required />
				</div>
				<input type="submit" value="REGISTER" class="btn btn-primary" />
			</form>
		</div>
