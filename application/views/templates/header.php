<!DOCTYPE html>
<html>
                    <head>
                            
                        <title><?php echo $title; ?> - Shakhede MVC</title>
                        <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css"); ?>" />
                        <link rel="stylesheet" href="<?= base_url("assets/css/jasny-bootstrap.css") ?>" />
                        <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>" />
                        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
                        <script type="text/javascript" src="<?= base_url("assets/js/bootstrap.js"); ?>"></script>
                        <script type="text/javascript" src="<?= base_url("assets/js/respond.min.js"); ?>"></script>
                        <script type="text/javascript" src="<?= base_url("assets/js/html5shiv.js"); ?>"></script>
                        <script type="text/javascript" src="<?= base_url("assets/js/jasny-bootstrap.js"); ?>"></script>
                          <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            
                    </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
            </button>
      
      
        <div class="navbar-header">
          <a class="navbar-brand" href="<?= base_url(); ?>">SHAKHEDE MVC</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        	<ul class="nav navbar-nav nav-left">
        <li class="active"><a  href="<?= base_url(); ?>">Home</a></li>
          <li><a href="<?= base_url("pages/about"); ?>">About</a></li>
          <li><a href="<?= base_url("pages/contact"); ?>">Contact</a></li>
          </ul>
          
          			<a href="<?= base_url(); ?>" class="logo visible-lg visible-md"><img src="<?= base_url("assets/img/logo.jpg"); ?>" alt="dodolan manuk responsive catalog themes"></a>
			<div id="brand" class="visible-lg visible-md">&nbsp;</div>
			<ul class="nav navbar-nav nav-right">

          <?php
            if($this->session->has_userdata("id"))
            {
          ?>
          <li><a href="<?= base_url("news/create"); ?>">Create News</a></li>
          
          
          <li><a href="<?= base_url("user/logout"); ?>">Logout</a></li>

          <?php
            }
            else
            {
          ?>
          <li><a href="<?= base_url("user/login"); ?>">Login</a></li>
          <li><a href="<?= base_url("user/register"); ?>">Register</a></li>
          <?php
            }
          ?>
        </ul>

      </div>
      </div>

    </nav>
<div class="heads" style="background: url(<?= base_url("assets/img/img02.jpg"); ?>) center center;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="textlimit"><span></span> <?php echo $title; ?> </h2>
				</div>
			</div>
		</div>
	</div><br>

        