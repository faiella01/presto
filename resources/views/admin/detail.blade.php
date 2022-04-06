<x-layout>
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 align-self-start my-5 bg-white gap-5 pe-md-5">
                <div class="carousel">
                    <div class="carouselTrackContainer">
                        <ul class="carouselTrack">
                            @foreach ($ogg->images as $image)
                            <li class="carouselSlide {{ $loop->index == 0 ? 'currentSlide' : '' }}">
                                <img class="carouselImage" src="{{ $image->getUrl(600,400) }}" alt="">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button class="carouselButton carouselButtonLeft">
                            <i class="bi bi-arrow-left-circle"></i>
                        </button>
                        <div class="carouselNav">
                            @foreach ($ogg->images as $image)
                            <button class="p-0 carouselIndicator {{ $loop->index == 0 ? 'currentSlide' : '' }}">
                                <img class="w-100" src="{{ $image->getUrl(120,120) }}" alt="">
                            </button>
                            @endforeach
                        </div>
                        <button class="carouselButton carouselButtonRight">
                            <i class="bi bi-arrow-right-circle"></i>
                        </button>
                    </div>
                    
                    
                    
                    
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 align-self-start mt-5 bg-white align-items-center gap-3 pt-5 pt-md-0">
                <h2>{!! $ogg->title !!}</h2>
                <h5 class="mt-4">{{__('ui.costo_prodotto_see')}} {{ $ogg->price }}€</h5>
                <h5 class="mt-5">{{__('ui.descrizione_see')}}</h5>
                <p>{{ $ogg->body }}</p>
            </div>
        </div>
    </div>
    
    
</x-layout>