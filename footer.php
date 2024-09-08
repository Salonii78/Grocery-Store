<!--footer-->
<div class="footer">
	<div class="container">
		<div class="col-md-4 footer-grid">
			<h3>Contact Us</h3>
			<ul>
					<li><p><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Navrangpura, Ahmedabad - 380009.</p></li>
					<li><p><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;+91 9749749745</p></li>
					<li><p><a href="mailto:grocery@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;grocery@gmail.com</a></p></li>
			</ul>
		</div>
		<div class="col-md-2 footer-grid ">
			<h3>Menu</h3>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="categories.php">Categories</a></li>
				<li><a href="feedback.php">Feedback</a></li>						 
				<li><a href="contact.php">Contact Us</a></li>
			</ul>
		</div>
		<div class="col-md-3 footer-grid ">
			<h3>Customer Services</h3>
			<ul>
				<li><a href="orderhistory.php">Order History</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="categories.php">Online Shopping</a></li>						 
			</ul>
		</div>
		<div class="col-md-3 footer-grid">
			<h3>My Account</h3>
			<ul>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
		<div class="copy-right">
			<p> &copy; 2022 Online Grocery Shopping. All Rights Reserved.</p>
		</div>
	</div>
</div>
<!-- //footer-->

<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>
</body>
</html>