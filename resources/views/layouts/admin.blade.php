<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.naksoid.com/elephant-v1.3.0/theme-2/dashboard-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2017 17:21:17 GMT -->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laragame &middot; / &middot; remake</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<meta name="description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
	<meta property="og:url" content="http://demo.naksoid.com/elephant">
	<meta property="og:type" content="website">
	<meta property="og:title" content="The fastest way to build modern admin site for any platform, browser, or device">
	<meta property="og:description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
	<meta property="og:image" content="../../elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@naksoid">
	<meta name="twitter:creator" content="@naksoid">
	<meta name="twitter:title" content="The fastest way to build modern admin site for any platform, browser, or device">
	<meta name="twitter:description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
	<meta name="twitter:image" content="../../elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">
	<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
	<link rel="shortcut icon" href="{{asset('/LG2.png')}}"/>
	<link rel="manifest" href="manifest.json">
	<link rel="mask-icon" href="safari-pinned-tab.svg" color="#0ac29d">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
	<link rel="stylesheet" href="{{asset('/admin/css/vendor.min.css')}}">
	<link rel="stylesheet" href="{{asset('/admin/css/elephant.min.css')}}">
	<link rel="stylesheet" href="{{asset('/admin/css/application.min.css')}}">
	<link href="{{asset('/css/jquery.dataTables.css')}}" rel="stylesheet">
	<link href="{{asset('/css/dataTables.bootstrap.css')}}" rel="stylesheet">
	{{-- Sweetalert --}}
	<link rel="stylesheet" href="{{asset('/dist/sweetalert.css')}}">
</head>
<body class="layout layout-header-fixed">
	<div class="layout-header">
		<div class="navbar navbar-default">
			<div class="navbar-header">
				<a class="navbar-brand navbar-brand-center" href="{{url('/home')}}">
					<img class="navbar-brand-logo" src="{{asset('/template/img/logo2.png')}}" alt="Laragame\remake">
				</a>
				<button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
					<span class="sr-only">Toggle navigation</span>
					<span class="bars">
						<span class="bar-line bar-line-1 out"></span>
						<span class="bar-line bar-line-2 out"></span>
						<span class="bar-line bar-line-3 out"></span>
					</span>
					<span class="bars bars-x">
						<span class="bar-line bar-line-4"></span>
						<span class="bar-line bar-line-5"></span>
					</span>
				</button>
				<button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="arrow-up"></span>
					<span class="ellipsis ellipsis-vertical">
						<img class="ellipsis-object" width="32" height="32" src="img/0180441436.jpg" alt="Teddy Wilson">
					</span>
				</button>
			</div>
			<div class="navbar-toggleable">
				<nav id="navbar" class="navbar-collapse collapse">
					<button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="bars">
							<span class="bar-line bar-line-1 out"></span>
							<span class="bar-line bar-line-2 out"></span>
							<span class="bar-line bar-line-3 out"></span>
							<span class="bar-line bar-line-4 in"></span>
							<span class="bar-line bar-line-5 in"></span>
							<span class="bar-line bar-line-6 in"></span>
						</span>
					</button>
					<ul class="nav navbar-nav navbar-right">
						<li class="visible-xs-block">
							<h4 class="navbar-text text-center">Hi, Teddy Wilson</h4>
						</li>
						<li class="hidden-xs hidden-sm">
							<form class="navbar-search navbar-search-collapsed">
								<div class="navbar-search-group">
									<input class="navbar-search-input" type="text" placeholder="Search for people, companies, and more&hellip;">
									<button class="navbar-search-toggler" title="Expand search form ( S )" aria-expanded="false" type="submit">
										<span class="icon icon-search icon-lg"></span>
									</button>
									<button class="navbar-search-adv-btn" type="button">Advanced</button>
								</div>
							</form>
						</li>
						<li class="dropdown hidden-xs">
							<button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										{{ Auth::user()->name }} <span class="caret"></span>
									</a>

									<ul class="dropdown-menu dropdown-menu-right" role="menu">
										<li>
											<a href="{{ url('/logout') }}"
											onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
											Logout
										</a>

										<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</li>
								</ul>
							</li>
						</button>
					</li>
					<li class="visible-xs-block">
						<a href="contacts.html">
							<span class="icon icon-users icon-lg icon-fw"></span>
							Contacts
						</a>
					</li>
					<li class="visible-xs-block">
						<a href="profile.html">
							<span class="icon icon-user icon-lg icon-fw"></span>
							Profile
						</a>
					</li>
					<li class="visible-xs-block">
						<a href="login-1.html">
							<span class="icon icon-power-off icon-lg icon-fw"></span>
							Sign out
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
<div class="layout-main">
	<div class="layout-sidebar">
		<div class="layout-sidebar-backdrop"></div>
		<div class="layout-sidebar-body">
			<div class="custom-scrollbar">
				<nav id="sidenav" class="sidenav-collapse collapse">
					<ul class="sidenav">
						<li class="sidenav-search hidden-md hidden-lg">
							<form class="sidenav-form" action="http://demo.naksoid.com/">
								<div class="form-group form-group-sm">
									<div class="input-with-icon">
										<input class="form-control" type="text" placeholder="Search…">
										<span class="icon icon-search input-icon"></span>
									</div>
								</div>
							</form>
						</li>
						<li class="sidenav-heading">Navigation</li>
						<li class="sidenav-item has-subnav active">
							<a href="dashboard-1.html" aria-haspopup="true">
								<span class="sidenav-icon icon icon-home"></span>
								<span class="sidenav-label">Dashboards</span>
							</a>
							<ul class="sidenav-subnav collapse">
								<li class="sidenav-subheading">Dashboards</li>
								<li><a href="{{url('/home')}}">Dashboard 1</a></li>
							</ul>
						</li>


						<li class="sidenav-item has-subnav">
							<a href="#" aria-haspopup="true">
								<span class="sidenav-icon icon icon-list"></span>
								<span class="sidenav-label">Tables</span>
							</a>
							<ul class="sidenav-subnav collapse">
								<li class="sidenav-subheading">Tables</li>
								@role('member')
								<li><a href="{{ route('categoris.index') }}">Categori</a></li>
								@endrole
								@role('admin')
								<li><a href="{{ route('categoris.index') }}">Categori</a></li>
								<li><a href="{{ route('beritas.index') }}">Berita</a></li>
								<li hidden=""><a href="{{ route('vidios.index') }}">Video</a></li>
								@endrole
							</ul>
						</li>

						<li class="sidenav-heading text-center">~Pages~</li>
						<li><a href="{{ route('blogs.index')}}">Blog</a></li>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
{{-- <div class="layout-content">
	<div class="layout-content-body">
		<div class="title-bar">

			
		</div>
	</div>
	<div class="layout-footer">
		<div class="layout-footer-body">
			<small class="version">Version 1.3.0</small>
			<small class="copyright">2017 &copy; Elephant By <a href="http://naksoid.com/">Naksoid</a></small>
		</div>
	</div>
</div> --}}

<div class="layout-content">
	@yield('content')
</div>
<div class="layout-footer">
	<div class="layout-footer-body">
		<small class="version">Version 1.3.0</small>
		<small class="copyright">2017 &copy; Elephant By <a href="http://naksoid.com/">Naksoid</a></small>
	</div>

	<div class="theme hidden">
		<div class="theme-panel theme-panel-collapsed">
			<div class="theme-panel-controls">
				<button class="theme-panel-toggler" title="Expand theme panel ( ] )" type="button">
					<span class="icon icon-cog icon-spin" aria-hidden="true"></span>
				</button>
			</div>
			<div class="theme-panel-body">
				<div class="custom-scrollbar">
					<div class="custom-scrollbar-inner">

						<ul class="theme-settings">


							<li class="theme-settings-item">
								<div class="theme-settings-label">Sidebar fixed</div>
								<div class="theme-settings-switch">
									<label class="switch switch-primary">
										<input class="switch-input" type="checkbox" name="layout-sidebar-fixed" data-sync="true">
										<span class="switch-track"></span>
										<span class="switch-thumb"></span>
									</label>
								</div>
							</li>
							<li class="theme-settings-item">
								<div class="theme-settings-label">Sidebar sticky*</div>
								<div class="theme-settings-switch">
									<label class="switch switch-primary">
										<input class="switch-input" type="checkbox" name="layout-sidebar-sticky" data-sync="true">
										<span class="switch-track"></span>
										<span class="switch-thumb"></span>
									</label>
								</div>
							</li>
							<li class="theme-settings-item">
								<div class="theme-settings-label">Sidebar collapsed</div>
								<div class="theme-settings-switch">
									<label class="switch switch-primary">
										<input class="switch-input" type="checkbox" name="layout-sidebar-collapsed" data-sync="false">
										<span class="switch-track"></span>
										<span class="switch-thumb"></span>
									</label>
								</div>
							</li>
							<li class="theme-settings-item">
								<div class="theme-settings-label">Footer fixed</div>
								<div class="theme-settings-switch">
									<label class="switch switch-primary">
										<input class="switch-input" type="checkbox" name="layout-footer-fixed" data-sync="true">
										<span class="switch-track"></span>
										<span class="switch-thumb"></span>
									</label>
								</div>
							</li>
							<li class="theme-settings-description">
								<span>
									<strong>Sidebar sticky*</strong> - by scrolling up and down the page, the menu placed on the sidebar moves along with the content until the bottom of the menu is reached. <a href="page-layouts.html">Learn more</a></span>
								</li>
							</ul>
							<hr class="theme-divider">
							<ul class="theme-variants">
								<li class="theme-variants-item">
									<a class="theme-variants-link" href="http://demo.naksoid.com/elephant-v1.2.0/flaming-red/" title="Flaming Red (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
										<img class="img-responsive" src="img/9722110524.jpg" alt="Flaming Red Theme">
									</a>
									<a class="theme-variants-alt" href="http://demo.naksoid.com/elephant-v1.2.0/flaming-red-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
								</li>
								<li class="theme-variants-item">
									<a class="theme-variants-link" href="http://demo.naksoid.com/elephant-v1.2.0/flaming-red-inverse/" title="Flaming Red (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
										<img class="img-responsive" src="img/9870681590.jpg" alt="Flaming Red Theme">
									</a>
									<a class="theme-variants-alt" href="http://demo.naksoid.com/elephant-v1.2.0/flaming-red-inverse-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
								</li>
								<li class="theme-variants-item">
									<a class="theme-variants-link" href="http://demo.naksoid.com/elephant-v1.2.0/theme-4/" title="Flatistic Green (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
										<img class="img-responsive" src="img/9964167452.jpg" alt="Flatistic Green Theme">
									</a>
									<a class="theme-variants-alt" href="http://demo.naksoid.com/elephant-v1.2.0/theme-4-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
								</li>
								<li class="theme-variants-item">
									<a class="theme-variants-link" href="http://demo.naksoid.com/elephant-v1.2.0/theme-4-inverse/" title="Flatistic Green (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
										<img class="img-responsive" src="img/1007517980.jpg" alt="Flatistic Green Theme">
									</a>
									<a class="theme-variants-alt" href="http://demo.naksoid.com/elephant-v1.2.0/theme-4-inverse-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
								</li>
								<li class="theme-variants-item">
									<a class="theme-variants-link" href="http://demo.naksoid.com/elephant-v1.2.0/theme-3/" title="Midnight Blue (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
										<img class="img-responsive" src="img/1015664515.jpg" alt="Midnight Blue Theme">
									</a>
									<a class="theme-variants-alt" href="http://demo.naksoid.com/elephant-v1.2.0/theme-3-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
								</li>
								<li class="theme-variants-item">
									<a class="theme-variants-link" href="http://demo.naksoid.com/elephant-v1.2.0/theme-3-inverse/" title="Midnight Blue (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
										<img class="img-responsive" src="img/1025453682.jpg" alt="Midnight Blue Theme">
									</a>
									<a class="theme-variants-alt" href="http://demo.naksoid.com/elephant-v1.2.0/theme-3-inverse-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
								</li>
								<li class="theme-variants-item">
									<a class="theme-variants-link" href="http://demo.naksoid.com/elephant-v1.2.0/theme-5/" title="Materialistic Blue (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
										<img class="img-responsive" src="img/1033422797.jpg" alt="Materialistic Blue Theme">
									</a>
									<a class="theme-variants-alt" href="http://demo.naksoid.com/elephant-v1.2.0/theme-5-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
								</li>
								<li class="theme-variants-item">
									<a class="theme-variants-link" href="http://demo.naksoid.com/elephant-v1.2.0/theme-5-inverse/" title="Materialistic Blue (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
										<img class="img-responsive" src="img/1044368407.jpg" alt="Materialistic Blue Theme">
									</a>
									<a class="theme-variants-alt" href="http://demo.naksoid.com/elephant-v1.2.0/theme-5-inverse-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
								</li>
								<li class="theme-variants-item">
									<a class="theme-variants-link" href="http://demo.naksoid.com/elephant-v1.2.0/theme-6/" title="Eerie Black (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
										<img class="img-responsive" src="img/1050099119.jpg" alt="Eerie Black Theme">
									</a>
									<a class="theme-variants-alt" href="http://demo.naksoid.com/elephant-v1.2.0/theme-6-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
								</li>
								<li class="theme-variants-item">
									<a class="theme-variants-link" href="http://demo.naksoid.com/elephant-v1.2.0/theme-6-inverse/" title="Eerie Black (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
										<img class="img-responsive" src="img/1067123558.jpg" alt="Eerie Black Theme">
									</a>
									<a class="theme-variants-alt" href="http://demo.naksoid.com/elephant-v1.2.0/theme-6-inverse-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
		<script src="{{asset('/admin/js/vendor.min.js')}}"></script>
		<script src="{{asset('/admin/js/elephant.min.js')}}"></script>
		<script src="{{asset('/admin/js/application.min.js')}}"></script>
		<script src="{{asset('/admin/js/demo.min.js')}}"></script>
		{{-- SweetyAlert --}}
		<script src="{{asset('/dist/sweetalert.min.js')}}"></script>
		@include('sweet::alert')
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','{{asset('/www.google-analytics.com/analytics.js')}}','ga');
			ga('create', 'UA-83990101-1', 'auto');
			ga('send', 'pageview');
		</script>
	</body>

	{{-- Custom.js --}}
	<script src="{{asset('/js/custom.js')}}"></script>
	{{-- Datatables --}}
	<script src="{{asset('/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('/js/dataTables.bootstrap.min.js')}}"></script>
	{{-- TinyMCE --}}
	<script src="{{asset('/js/tinymce/jquery.tinymce.min.js')}}"></script>
	<script src="{{asset('/js/tinymce/tinymce.min.js')}}"></script>
	@include('custom.tiny')
	@yield('scripts')

	<!-- Mirrored from demo.naksoid.com/elephant-v1.3.0/theme-2/dashboard-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2017 17:21:17 GMT -->
	</html>