<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow">
	
	@if (Route::currentRouteName() == 'announcement.create')
	<a class="logo ms-3" href="{{route('home')}}">
		<img src="/logo/logo-wide-pc.png" style="max-width:130px" class="me-3" alt="Logo Presto Bradipi">
	</a>
	@elseif (Route::currentRouteName() == 'announcement.category')
	<a class="logo ms-3" href="{{route('home')}}">
		<img src="/logo/logo-wide-tired.png" style="max-width:130px" class="me-3" alt="Logo Presto Bradipi">
	</a>
	@elseif (Route::currentRouteName() == 'about.us')
	<a class="logo ms-3" href="{{route('home')}}">
		<img src="/logo/logo-wide-sleep.png" style="max-width:130px" class="me-3" alt="Logo Presto Bradipi">
	</a>
	@elseif (Route::currentRouteName() == 'login')
	<a class="logo ms-3" href="{{route('home')}}">
		<img src="/logo/logo-wide-food.png" style="max-width:130px" class="me-3" alt="Logo Presto Bradipi">
	</a>
	@else
	<a class="logo ms-3" href="{{route('home')}}">
		<img src="/logo/logo-wide.png" style="max-width:130px" class="me-3" alt="Logo Presto Bradipi">
	</a>
	@endif
	<button class="navbar-toggler me-3 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
		<i class="bi bi-list"></i>
	</button>
	<div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
		<div class="navbar-nav me-auto ms-auto mb-2 mb-lg-0 mt-lg-0 mt-3">
			<div class="justify-content-center align-items-center gap-3 d-flex d-lg-none"> 
				<li>
					@include('components.locale',['lang'=>'it','nation'=>'it'])
				</li>
				<li>
					@include('components.locale',['lang'=>'en','nation'=>'gb'])
				</li>
				<li>
					@include('components.locale',['lang'=>'es','nation'=>'es'])
				</li>
			</div>  
			<a href="{{route('home')}}" class="nav-item nav-link ms-3 ms-lg-0 ">
				<button class="btn offset-acc">
					Home
				</button>
			</a>
			<a href="{{route('about.us')}}" class="nav-item nav-link ms-3 ms-lg-0">
				<button class="btn offset-main">
					{{__('ui.chi_siamo')}}
				</button>
			</a>
			<div class="dropdown nav-item nav-link ms-3 ms-lg-0">
				<button class="btn offset-main" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
					{{__('ui.categorie')}}
				</button>
				<ul class="dropdown-menu" >
					@foreach($categories as $category)
					<li><a class="dropdown-item category-link" href="{{route('announcement.category',compact('category'))}}">{{$category->name}}</a></li>
					@endforeach
				</ul>
			</div>
			<div class="nav-item nav-link ms-3 ms-lg-0">
				<a class="text-decoration-none" href="{{route('announcement.create')}}">
					<button class="btn offset-main">
						{{__('ui.inserisci_annuncio')}}
					</button>
				</a>
			</div>
			@if (Route::currentRouteName() != 'home')
			{{-- SEARCHBOX NAVBAR --}}
			<div class="nav-item nav-link search-box ms-3 ms-lg-0">
				<form action="{{route('search')}}" method="get" class="d-flex justify-content-center">
					<button class="btn-search"><i class="bi bi-search"></i></button>
					<input type="text" name="q" class="input-search">
				</form>
			</div>
			@endif
		</div>
	</div>
</nav>