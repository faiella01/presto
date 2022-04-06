<x-layout>
    <div class="container my-3">
        <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 align-self-start my-5 bg-white p-0">
                    <a href="{{ route('announcement.category', $ogg->category) }}" class="categoryDetail">{{ $ogg->category->name }}</a>
                    <div class="carousel">
                        <div class="carouselTrackContainer">
                            <ul class="carouselTrack">
                                @if (count($ogg->images) > 0)
                                    @foreach ($ogg->images as $image)
                                    <li class="carouselSlide {{ $loop->index == 0 ? 'currentSlide' : '' }}">
                                        <img class="carouselImage" src="{{ $image->getUrl(600,400) }}" alt="">
                                    </li>
                                    @endforeach
                                @else
                                    <li class="carouselSlide">
                                        <img class="carouselImage" src="../media/category-standard.jpg" alt="">
                                    </li>
                                @endif
                            </ul>
                        </div>

                        @if (count($ogg->images) > 1)
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
                        @endif
                        
                    </div>
                </div>
            <div class="col-12 col-md-6 col-lg-4 align-self-start mt-5 bg-white align-items-center gap-3 pt-5 pt-md-3 ps-5">
                <h2>{!! $ogg->title !!}</h2>
                <h5 class="mt-4">{{__('ui.costo_prodotto')}} {{ $ogg->price }}€</h5>
                <h5 class="mt-5">{{__('ui.descrizione')}}</h5>
                <p>{{ $ogg->body }}</p>
                <p><small><i>Creato da {{ $ogg->user->name }} il {{ $ogg->created_at->format('d/m/y') }}</i></small></p>
            </div>
        </div>
    </div>

    @if($relatedAnnouncement->first()==null)
    <div class="container mt-3">
        <h4 class=" temb-5 pt-5 text-center">{{__('ui.no_annunci_correlati')}}</h4>
    </div>
    @else
        <div class="container mt-5">
            <h4 class="m-0 pt-5">{{__('ui.annunci_correlati')}}</h4>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                @foreach ($relatedAnnouncement as $filter)
                    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                        <x-card
                        :announcement="$filter"
                        ></x-card>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</x-layout>