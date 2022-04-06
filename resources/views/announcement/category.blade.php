<x-layout>
    @if (count($announcements) != 0)
        <h2 class="my-5 text-center">{{__('ui.tutti_articoli')}} {!! $category->name !!}</h2>
            
        <div class="container">
            <div class="row">
                @foreach ($announcements as $announcement)
                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <section class="section-products">
                        <div id="product-1" class="single-product">
                            <a href="{{ route('announcement.category', $announcement->category) }}" class="categoryDetail">{{ $announcement->category->name }}</a>
                            <div class="part-1">
                                @if ($announcement->images->first() != null)
                                    <img src="{{ $announcement->images->first()->getUrl(350,230) }}" class="imgCard" alt="...">
                                @else
                                    <img src="/media/category-standard.jpg" class="imgCard" alt="">
                                @endif
                                <ul>
                                    <li><a href="{{ route('announcement.show', ['id'=>$announcement->id]) }}"><i class="bi bi-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">{!! $announcement->title !!}</h3>
                                <h4 class="product-old-price">{!! $announcement->price !!}€</h4>
                                @if ($announcement->user != null)
                                    <h4 class="product-price">
                                        <small class="text-muted">Creato da {!! $announcement->user->name !!} il {!! $announcement->created_at->format('d/m/y') !!}</small>
                                    </h4>
                                @else
                                    <h4 class="product-price">
                                        <small class="text-muted">{{__('ui.creato')}} il {!! $announcement->created_at->format('d/m/y') !!}</small>
                                    </h4>
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
                @endforeach
                
                {{ $announcements->links() }}
            </div>
        </div>
    @else
        <h2 class="my-5 text-center">{{__('ui.articoli_categoria')}}</h2>
    @endif

</x-layout> 