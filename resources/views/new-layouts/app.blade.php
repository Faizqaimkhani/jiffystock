<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="hRn3DM9gARTH5yfo6pfGy0sbfKmpgRGEbfIz9Nbn">

	<title>{{ $title }}</title>
	<meta name="keywords" content="Lorem Ipsum un testo segnaposto utilizzato nel settore della tipografia e della stampa." />
	<meta name="description" content="Lorem Ipsum un testo segnaposto utilizzato nel settore della tipografia e della stampa." />
	<meta property="og:title" content="Lorem Ipsum un testo segnaposto utilizzato nel settore della tipografia e della stampa." />
	<meta property="og:site_name" content="Jiffystock" />
	<meta property="og:description" content="Lorem Ipsum un testo segnaposto utilizzato nel settore della tipografia e della stampa." />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="index.html" />
	<meta property="og:image" content="public/media/06082021062332-200x200-slider-1.jpg" />
	<meta property="og:image:width" content="600" />
	<meta property="og:image:height" content="315" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:url" content="index.html">
	<meta name="twitter:title" content="Lorem Ipsum un testo segnaposto utilizzato nel settore della tipografia e della stampa.">
	<meta name="twitter:description" content="Lorem Ipsum un testo segnaposto utilizzato nel settore della tipografia e della stampa.">
	<meta name="twitter:image" content="public/media/06082021062332-200x200-slider-1.jpg">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<!--favicon-->
	<link rel="shortcut icon" href="{{ asset('new-frontend/media/06082021041057-favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('new-frontend/media/06082021041057-favicon.ico') }}" type="image/x-icon">
	<!-- css -->
	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('new-frontend/css/bootstrap.min.css') }}" rel="stylesheet">
	<style type="text/css">
		:root {
			--menu-background-color: #2d3748;
		}
	</style>
	<link href="{{ asset('new-frontend/css/bootstrap-icons.css') }}" rel="stylesheet">
	<link href="{{ asset('new-frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
	<link href="{{ asset('new-frontend/css/jquery.gritter.min.css') }}" rel="stylesheet">
	<link href="{{ asset('new-frontend/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('new-frontend/css/responsive.css') }}" rel="stylesheet">
	<link href="{{ asset('new-frontend/css/brand.css') }}" rel="stylesheet">

	@yield('css')

	<style media="screen">
		.bg-brand {
			background-color: rgb(241 136 25);
		}
		.nav-list-item {
			display: flex;
			align-items: center;
			padding: 0px 10px;
		}
		
	</style>
	 
	
</head>

<body>
	<div id="google_translate_element" ></div>
	<!--loader-->
	<div class="tw-loader">
		<div class="tw-ellipsis">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	<!--/loader/-->
	<!-- scrollToTop -->
	<a href="#top" class="scroll-to-top">
		<i class="bi bi-arrow-up"></i>
	</a>
	<!-- /scrollToTop -->

	<!--Top Header-->
	<div class="top-header bg-dark">
		<div class="mx-3">
			<div class="row">
				<div class="col-lg-6">
					<ul class="top-contact">
						<li><a href="javasctipt:;" class="text-white">Contact</a></li>
						<li><a href="javasctipt:;" class="text-white">Help</a></li>
						<li><a href="javasctipt:;" class="text-white">Information and Guidelines</a></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="top-list">
						<li><a href="javascript:void(0)" class="text-white"><i class="bi bi-telephone-fill"></i>60&nbsp;1122&nbsp;558&nbsp;2</a></li>
						<li><a href="javascript:void(0)" class="text-white"><i class="bi bi-envelope"></i>info@jiffystock.com</a></li>
						<li>
							<div class="btn-group language-menu">
								<a href="javascript:void(0);" id="showLanguage" class="dropdown-toggle text-white"  data-code="en" data-bs-toggle="dropdown" aria-expanded="false">
									<span class="flag_custom">
											{{ flag('us') }}
									</span>English
								</a>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0)" id="English" data-country-flag="us" data-code="en" onclick="translateLanguage(this.id);">
											<span class="flag_custom">
													{{ flag('us' ) }}
											</span>English
										</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0)" data-country-flag="sa" id="Arabic" data-code="ar" onclick="translateLanguage(this.id);">
											<span class="flag_custom">
													{{ flag('sa' ) }}
											</span>Arabic
										</a>
									</li>
										<li>
												<a class="dropdown-item" href="javascript:void(0)" data-country-flag="cn" id="Chinese" data-code="zh-CN" onclick="translateLanguage(this.id);">
												<span class="flag_custom">
														{{ flag('cn' ) }}
												</span>Chinese
											</a>
										</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--/Top Header/-->

	@include('new-layouts.navbars.navbar')

	@yield('content')

	@include('new-layouts.footer')

	@stack('js')
	@stack('support')
	
	<div id="google_translate_element" style="opacity: 0 !important;
		position: absolute !important;
		z-index: -1000 !important;"></div> 

	<script type="text/javascript"> 
	function googleTranslateElementInit() { 
	  new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element'); 
	} 
	</script> 
  
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
	
	<script>
		function translateLanguage(lang) {

			var $frame = $('.goog-te-menu-frame:first');
			
			var code = $('#' + lang).data('code');
			var flag = $('#' + lang).data('country-flag');
			var selectField = document.querySelector("#google_translate_element select");
			for(var i=0; i < selectField.children.length; i++){
				var option = selectField.children[i];
				// find desired langauge and change the former language of the hidden selection-field 
				if(option.value==code){
					selectField.selectedIndex = i;
					// trigger change event afterwards to make google-lib translate this side
					selectField.dispatchEvent(new Event('change'));
					
					var content = '<span class="flag_custom" >{{ flag(' + flag + ' ) }}</span> ' + lang;
					
                    $('#showLanguage').html(content);
					break;
				}
			}
			
		}
	</script>
</body>

</html>
