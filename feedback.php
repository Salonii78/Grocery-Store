<?php
	include "header.php";
?>
	<div class="banner-top">
	<div class="container">
		<h3 >Feedback</h3>
		<h4><a href="index.php">Home</a><label>/</label>Feedback</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!-- contact -->
<div class="contact">
	<div class="container">
		<div class="spec ">
			<h3>Feedback</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
		</div>
		<div class=" contact-w3">	
			<div class="col-md-12 contact-left">
				<div id="container">
					<!--Horizontal Tab-->
					<div id="parentHorizontalTab">
						<div class="resp-tabs-container hor_1">
							<div>
								<center><h1><b>We Value Your Feedback</b></h1></center>
								<form action="addfeedback.php" method="post">
									<div class="star-rating">
                                        <div class="star-input">
                                            <input type="radio" name="rating" id="rating-5" value="5" required>
                                            <label for="rating-5" class="fas fa-star"></label>
                                            <input type="radio" name="rating" id="rating-4" value="4">
                                            <label for="rating-4" class="fas fa-star"></label>
                                            <input type="radio" name="rating" id="rating-3" value="3">
                                            <label for="rating-3" class="fas fa-star"></label>
                                            <input type="radio" name="rating" id="rating-2" value="2">
                                            <label for="rating-2" class="fas fa-star"></label>
                                            <input type="radio" name="rating" id="rating-1" value="1">
                                            <label for="rating-1" class="fas fa-star"></label>
                                        </div>
                                    </div>
									<textarea name="comment" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
									<?php
										if(!isset($_SESSION['uemail'])){
											echo '<input type="submit" name="formsubmit" value="Give Feedback" disabled>';
										}else{
											echo '<input type="submit" name="formsubmit" value="Give Feedback">';
										}
									?>
								</form>
							</div>
							<div>
							</div>
						</div>
					</div>
				</div>				
			</div>
		<div class="clearfix"></div>
	</div>
	</div>
</div>
<!-- //contact -->
<?php
	include "footer.php";
?>