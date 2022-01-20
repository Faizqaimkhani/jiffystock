
	<!-- Footer -->
	<!-- Footer Section -->
	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
						<div class="footer-widget mb10">
							<h4 class="widget-title">Contact Us</h4>
							<ul class="widget-contact">
								<li><strong>Address:</strong> 56 King Street, New York</li>

								<li><strong>Email:</strong> support@jiffystock.com</li>

								<li><strong>Phone:</strong> +1 964 123 456789</li>
							</ul>
						</div>
						<div class="social-media mb25">
							<a href="https://www.facebook.com/" target="_blank"><i class="bi bi-facebook"></i></a><a href="https://twitter.com/" target="_blank"><i class="bi bi-twitter"></i></a><a href="https://www.instagram.com/" target="_blank"><i
									class="bi bi-instagram"></i></a><a href="https://www.youtube.com/" target="_blank"><i class="bi bi-youtube"></i></a>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
						<div class="footer-widget mb25">
							<h4 class="widget-title">Quick links</h4>
							<ul class="widget-list">
								<li><a target="_self" href="javascript:void(0)">Privacy Policy</a></li>
								<li><a target="_self" href="javascript:void(0)">Terms & Conditions</a></li>
								<li><a target="_self" href="javascript:void(0)l">Purchasing Policy</a></li>
								<li><a target="_self" href="javascript:void(0)">Cookie Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
						<div class="footer-widget mb25">
							<h4 class="widget-title">Company</h4>
							<ul class="widget-list">
								<li><a target="_self" href="{{ url('about-us') }}">About us</a></li>
								<li><a target="_self" href="{{ url('contact-us') }}">Contact us</a></li>
								<li><a target="_self" href="javascript:void(0)">Career</a></li>
								<li><a target="_self" href="javascript:void(0)">Affiliate</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
						<div class="footer-widget mb25">
							<h4 class="widget-title">Subscribe our newsletter</h4>
							<p>Subscribe to the mailing list to receive updates on special offers, new arrivals and our promotions.</p>
							<div class="newsletter-form">
								<input name="subscribe_email" id="subscribe_email" type="email" placeholder="Enter your email address" />
								<a class="btn theme-btn mt10 full subscribe_btn sub_btn" href="javascript:void(0);">Submit</a>
								<div class="subscribe_msg mt5"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="copy-right">
							Copyright &copy; 2021. All rights reserved by <a href="/">Jiffystock</a> </div>
					</div>
					<div class="col-lg-6">
						<div class="payment-method payments">
							<!-- <img src="{{ asset('new-frontend/media/16112021165416-payment.png') }}" alt="" /> -->
							<div class="crypto mx-1">
	              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2000 2000" width="30" height="30"><path d="M1000,0c552.26,0,1000,447.74,1000,1000S1552.24,2000,1000,2000,0,1552.38,0,1000,447.68,0,1000,0" fill="#53ae94"/><path d="M1123.42,866.76V718H1463.6V491.34H537.28V718H877.5V866.64C601,879.34,393.1,934.1,393.1,999.7s208,120.36,484.4,133.14v476.5h246V1132.8c276-12.74,483.48-67.46,483.48-133s-207.48-120.26-483.48-133m0,225.64v-0.12c-6.94.44-42.6,2.58-122,2.58-63.48,0-108.14-1.8-123.88-2.62v0.2C633.34,1081.66,451,1039.12,451,988.22S633.36,894.84,877.62,884V1050.1c16,1.1,61.76,3.8,124.92,3.8,75.86,0,114-3.16,121-3.8V884c243.8,10.86,425.72,53.44,425.72,104.16s-182,93.32-425.72,104.18" fill="#fff"/></svg>
	            </div>
	            <div class="paypal mx-1">
	              <img class="paypal-icon" src="{{ asset('new-frontend/paypal.svg') }}" alt="">
	            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /Footer Section -->

	<!-- js -->
	<script src="{{ asset('new-frontend/js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('new-frontend/js/popper.min.js') }}"></script>
	<script src="{{ asset('new-frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('new-frontend/js/scrolltop.js') }}"></script>
	<script src="{{ asset('new-frontend/js/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('new-frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('new-frontend/js/jquery.popupoverlay.min.js') }}"></script>
	<script src="{{ asset('new-frontend/js/jquery.gritter.min.js') }}"></script>
	<script>
		var is_rtl = "0";
		if (is_rtl == 1) {
			var isRTL = true;
		} else {
			var isRTL = false;
		}
		var theme_color = "#c62f2f";
		var base_url = "index.html";
		var public_path = "public/index.html";
	</script>
	<script src="{{ asset('new-frontend/js/scripts.js') }}"></script>
	<script src="{{ asset('new-frontend/pages/cart.js') }}"></script>
	<div class="custom-popup light width-100 dnone" id="lightCustomModal">
		<div class="padding-md">
			<h4 class="m-top-none"></h4>
		</div>
		<div class="text-center">
			<a href="javascript:void(0);" class="btn blue-btn lightCustomModal_close mr-10" onClick="onConfirm()">Confirm</a>
			<a href="javascript:void(0);" class="btn danger-btn lightCustomModal_close">Cancel</a>
		</div>
	</div>
	<a href="#lightCustomModal" class="btn btn-warning btn-small lightCustomModal_open dnone">Edit</a>
