<div class="barTop container-fluid">
    <div class="row">
        <div class="col-12 col-lg-6 d-flex align-items-center justify-content-start gap-2 gap-md-4 ">
            
            @auth
            {{-- <div class="navbar d-flex justify-content-start align-items-center gap-5" id="navbarSupportedContent"> --}}
                <p class="text-white mb-0 ms-2"> {{__('ui.ciao_utente')}} {{Auth::user()->name}} </p>
                <a href="{{route('logout')}}" class="bi bi-person-x nav-link text-danger auth tastoLogout"
                onclick="event.preventDefault(); document.getElementById('form-logout').submit()"></a>
                <form method="post" action="{{route('logout')}}" id="form-logout">
                    @csrf
                </form>
                <nav class="navbar navbar-light navbar-expand-xs text-white"> 
                    @if (Auth::user() && !Auth::user()->is_admin && !Auth::user()->is_revisor)
                    User Panel
                    @elseif (Auth::user()->is_revisor && !Auth::user()->is_admin)
                    Revisor Panel
                    @else
                    Admin Panel
                    @endif >>
                    <button class="navbar-toggler btn-outline-main text-white ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg">
                        <span class="bi bi-pc-display-horizontal"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
                        <h2 class="my-3 ms-3">
                            @if (Auth::user() && !Auth::user()->is_admin && !Auth::user()->is_revisor)
                            User Panel  
                            @elseif(Auth::user()->is_revisor && !Auth::user()->is_admin)
                            Revisor Panel
                            @else
                            Admin Panel
                            @endif
                        </h2>
                        <div class="nav-item nav-link ms-3 ms-lg-0">
                            <a class="text-decoration-none position-relative" href="{{route('announcements.autore',Auth::user())}}">
                                <button class="btn btn-outline-main " >
                                    {{__('ui.miei_annunci_min')}}
                                </button>
                                <span class="badge countRevisore rounded-pill bg-danger ">
                                    {{\App\Models\Announcement::ToBeRevisionedCountId(Auth::user()->id)}}
                                </span>
                            </a>
                        </div>
                        @if (Auth::user() && !Auth::user()->is_admin && !Auth::user()->is_revisor)
                        <div class="nav-item nav-link ms-3 ms-lg-0">
                            <a class="text-decoration-none position-relative" href="{{route('contact.work')}}">    
                                <button class="btn btn-outline-main">
                                    {{__('ui.btn_lavoraConNoi')}}
                                </button>
                            </a>    
                        </div>
                        @endif
                        @if((Auth::user()->is_revisor || Auth::user()->is_admin))
                        <div class="nav-item nav-link ms-3 ms-lg-0">
                            <a class="text-decoration-none position-relative" href="{{route('revisor.home')}}">
                                <button class="btn btn-outline-main " >
                                {{__('ui.btn_revisione')}}
                                </button>
                                <span class="badge countRevisore rounded-pill bg-danger ">
                                    {{\App\Models\Announcement::ToBeRevisionedCount()}}
                                </span>
                            </a>
                        </div>
                        @endif
                        @if (Auth::user() && Auth::user()->is_admin)
                        <div class="nav-item nav-link ms-3 ms-lg-0">
                            <a class="text-decoration-none position-relative" href="{{route('admin.autore')}}">
                                <button class="btn btn-outline-main " >
                                    {{__('ui.btn_gestisciGliAnnunci')}}
                                </button>
                            </a>
                        </div>
                        <div class="nav-item nav-link ms-3 ms-lg-0">
                            <a class="text-decoration-none position-relative" href="{{route('admin.panel')}}">
                                <button class="btn btn-outline-main " >
                                    Admin
                                </button>
                            </a>
                        </div>
                        @endif
                    </div>
                </nav>
                {{-- fine codice revisor panel offcanvas bar --}}
                @else
                
                <a class="nav-link text-white px-3 my-2 d-inline-block bi bi-person-check auth" href="{{route('login')}}"> Login</a>
                <a class="nav-link text-white px-3 my-2 d-inline-block bi bi-person-plus auth" href="{{route('register')}}"> Register</a>
                @endauth 
            </div>
            <div class="col-6 justify-content-end align-items-center gap-3 d-none d-lg-flex "> 
                <li class="d-flex">
                    @include('components.locale',['lang'=>'it','nation'=>'it'])
                </li>
                <li class="d-flex">
                    @include('components.locale',['lang'=>'en','nation'=>'gb'])
                </li>
                <li class="d-flex">
                    @include('components.locale',['lang'=>'es','nation'=>'es'])
                </li>
            </div>  
        </div>
    </div>









