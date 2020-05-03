<!DOCTYPE HTML>
<html lang="fr">
	<head >
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CovidCheck | {{$title}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="description" content="Cameroun-lutte contre le COVID19. Accédez en 
	temps réel au derniers rapports statistiques, en temps réel au Cameroun et dans toutes ses régions" />
	<meta name="keywords" content="Cameroun, COVID19, temps réel, diagrammes, coronavirus, statistiques, region," />
    <meta name="author" content="ALpha Labo" />
    {{--Metha for laravel nkd--}}
	<meta name="csrf-token" content="{{csrf_token()}}" >

	<!--style  -->
	<link rel="stylesheet" href="/css/bootstrap.css">
	<!-- chart -->
	<link rel="stylesheet" href="/js/dist/Chart.css">
	
    <link rel="stylesheet" href="/css/font-awesome.css">
	<link rel="stylesheet" href="/css/style2.css">
	
	</head>
	<body>
		@include('layouts._menu')
		
		@if($type_page == 'home')
			@include('layouts._header2')
			@include('layouts._region_section')
		@endIf

		@if($type_page == "region")
			@include('layouts._menu_region')
		@endIf

		<!-- page content -->
		@yield("content")
		<!-- end page content -->
		@include('layouts._footer')
		

	<script src="/js/dist/Chart.js"></script>
		<script src="/js/jquery-3.3.1.min.js"></script>
		<script src="/js/particles.min.js"></script>
		<script src="/js/code.js"></script>
		{{--		menu script for partial _menu--}}
		<script>
			$("#bar").click(function(){
				$(this).toggleClass("fa-times");
				// $(this).addClass("fa");
				$('.menu').toggleClass("active");
			})
		</script>
		{{--	end menu script--}}
		<script src="/css/bootstrap.min.js"></script>
		@yield("js")


	</body>

</html>