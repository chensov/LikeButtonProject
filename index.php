<?php

require_once 'config.php';
session_start();
require_once 'functions.php';
$posts = getPostLikes();
?>
<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Like Button</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link href="css/style.css" rel="stylesheet" media="screen">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
	</head>
	<body>
		
		<div class="container">
			<h1 class="title text-center">Twitter Like button with PHP, Ajax and MySQL</h1>
			<hr class="mb-2">
			<div class="text-center">
				<p> Post <strong class="ft-1 underline"></strong></p>
			</div>

			<?php 
			foreach ($posts as $key => $result) {       
			?>
			<div class="wrapper">
			  <div class="input-box">
			    <div class="tweet-area">
			      <span class="desc"><?php echo $result['description']; ?></span>
			    </div>
			    
			  </div>
			  <div class="bottom">
			    <ul class="icons">
			      <?php 
			      $like_id=$result['id'];
			      $ip_address=$_SERVER['REMOTE_ADDR'];
			      $count = checkUserAlreadyPost($like_id, $ip_address); 
			      ?>
			      <div class="feed" id="feed<?php echo $result['id']; ?>">
			      		<!-- check if the post has like -->
			      		<?php if($count == 0){ ?>
			      			<div class="heart" id="<?php echo $result['id']; ?>" rel="like" style="background-position: left center;"></div>
			      		<?php } else { ?>
			      			<div class="heart heartAnimation" id="<?php echo $result['id']; ?>" rel="unlike" style=""></div>
			      		<?php } ?>
			      	<div class="likes-heart">
			      		<!-- class=SCORE is where the number of likes is updated. check app.js-->
			      	  <span class="score"><?php echo $result['likesCount']; ?></span>
			      	  <span>Likes</span>
			      	</div>
			      </div>

			      <!-- <li><i class="far fa-file-image"></i></li>
			      <li><i class="fas fa-map-marker-alt"></i></li>
			      <li><i class="far fa-grin"></i></li>
			      <li><i class="far fa-user"></i></li> -->
			    </ul>
			    <div class="content">
			      <button>Answer</button>
			    </div>
			  </div>
			</div>
			<?php } ?>

	
		
		<div class="loader"></div>
	</body>
</html>
