<x-layout>
    
    @if (session('message'))
    <div class="alert alert-success m-0">
        {{ session('message') }}
    </div>
    @endif
    
    @if (session('tankyou'))
    <div class="alert alert-success m-0">
        {{ session('tankyou') }}
    </div>
    @endif
    
    @if (session('access.denied.revisor.only'))
    <div class="alert alert-danger m-0">
        {{__('ui.accesso_revisori')}}
    </div>
    @endif
    
    @if (session('access.denied.admin.only'))
    <div class="alert alert-danger m-0">
        {{__('ui.accesso_admin')}}
    </div>
    @endif
    
    {{-- INIZIO HEADER STARTBOOTSTRAP VIDEO --}}
    <header>
        <!-- This div is  intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
        <div class="overlay"></div>
        
        <!-- The HTML5 video element that will create the background video on the header -->
        <video class="d-none d-lg-block" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="/media/video_presto_01.mp4" type="video/mp4">
            </video>
            
            <!-- The header content -->
            <div class="container-fluid h-100 header-img">
                <div class="d-flex h-100 text-center align-items-center">
                    <div class="w-100 text-white testoHeader">
                        <h1 class="display-3">Find everything you need</h1>
                        <p class="lead mb-5">Search furnishings, services and items for sale on a single site.</p>
                        <div class="search__container">
                            <form action="{{route('search')}}" method="get" class="d-flex justify-content-center">
                                <input class="search__input" name="q" type="text" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        {{-- FINE HEADER STARTBOOTSTRAP VIDEO --}}
        
        <h2 class="mt-5 ms-5 ">{{__('ui.ultimi_annunci')}}</h2>
        
        
        <div class="container-home pb-5">
            @foreach ($announcements as $announcement)
            <div class="box opacity-0">
                <a class="linkAccordion" href="{{ route('announcement.show', ['id'=>$announcement->id]) }}">
                    <div class="testoAccordion mt-4 mt-lg-5">
                        <h5>{!! $announcement->category->name !!}</h5>
                        <h4 class="mt-2">{!! strtoupper(substr($announcement->title, 0, 10)) . '..' !!}</h3>
                            <h4 class="mt-2">{!! $announcement->price !!} €</h3>
                                <p class="mt-3">{!! substr($announcement->body, 0, 50) !!}</p>
                            </div>
                            <div class="overlaylinkAccordion"></div>
                            @if($announcement->images->first() != null)
                            <img src="{{$announcement->images->first()->getUrl(600,400)}}">
                            @else
                            <img src="./media/article-standard.jpg" alt="">
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
                
                <div class="container pt-5">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h2>{{__('ui.categorie_tendenza')}}</h2>
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row justify-content-evenly">
                        @foreach ($categories as $category)
                        <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0 p-4">
                            <div class="card-height-img p-0 zoom">
                                <div class="d-none"> {{ $imgDefault = true }} </div>
                                {{-- DA CONTROLLARE TEMPORANEAMENTE DISATTIVATA --}}
                                @if ($category->announcements != null)
                                @foreach ($category->announcements->where('is_accepted', true) as $announcement)
                                @if ($announcement->images->first() != null)
                                <img src="{{ $announcement->images->first()->getUrl(600,400) }}" class="img-fluid card-img" alt="...">
                                {{ $imgDefault = false }}
                                @break
                                @endif
                                @endforeach
                                @endif
                                @if ($imgDefault == true)
                                <img class="img-fluid card-img" src="./media/category-standard.jpg" alt="">
                                @endif
                                
                            </div>
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">{!! $category->name !!}</h5>
                                    <h6> {{__('ui.ci_sono')}} {!! $category->announcement_count !!} {{__('ui.(n)annunci_in_questa_categoria')}} </h6>
                                </div>
                                <div>
                                    <a href="{{route('announcement.category',compact('category'))}}" class="btn btn-primary tasti rounded-circle py-2"><i class="bi bi-arrow-right-circle"></i></a>
                                </div>
                            </div>
                            <hr class="mt-0 d-lg-none">
                        </div>
                        @endforeach
                        <hr class="d-none d-lg-block">
                    </div>
                </div>
                
                {{-- WHATSAPP BUTTON --}}
                <div>
                    <a href="https://api.whatsapp.com/send?phone=393391234567&text=%20Buongiorno%20Bradipi%20vorrei%20informazioni%20su%20..." class="float bi bi-whatsapp " target="_blank">
                    </a>
                </div>
                
                
            </x-layout>