<?php
require "header.php";

?>

<main>
	<div class="wrapper-main">
		<section class="section-default">
	
			<?php
			if (isset($_SESSION['userId'])) {//check if we have something available to us
				echo '<p class="login-status">You are logged in!</php>';
				
			}
			else{
				echo '<p class="login-status">You are logged out!</php>';
			}

			?>
		</section>
	</div>
</main>
<?php
require "footer.php";
?>