<x-layout>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('ui.annuncio_n')}} {{$announcement->id}}</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3"><h3>{{__('ui.utente_det')}}</h3></div>
                            <div class="col-md-9">
                                # {{$announcement->user->id}}, 
                                {{ $announcement->user->name }}, 
                                {{ $announcement->user->email}}
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-3"><h3>{{__('ui.titolo_det')}}</h3></div>
                            <div class="col-md-9"> {{$announcement->title}} </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-3"><h3>{{__('ui.categoria_det')}}</h3></div>
                            <div class="col-md-9"> {{$announcement->category->name}} </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-3"><h3>{{__('ui.descrizione_det')}}</h3></div>
                            <div class="col-md-9"> {{$announcement->body}} </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-2"><h3>{{__('ui.immagini_det')}}</h3></div>
                            <div class="col-md-10">
                                @foreach($announcement->images as $image)
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <img src="{{$image->getUrl(300,200)}}" class="rounded" alt="">
                                    </div>
                                    <div class="col-md-4">
                                        <strong class="my-2">Safe Search</strong><br>
                                        Adult: {{$image->adult}} <br>
                                        spoof: {{$image->spoof}} <br>
                                        medical: {{$image->medical}} <br>
                                        violence: {{$image->violence}} <br>
                                        racy: {{$image->racy}} <br>
                                        
                                    </div>
                                    <div class="col-md-4 text-start my-2">
                                        <strong class="my-2">Labels: </strong>
                                            @if ($image->labels)
                                                @foreach($image->labels as $label)
                                                    <li style="display:inline" class="text-start">{{$label}}, </li>
                                                @endforeach
                                            @endif    
                                    </div>
                                    
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 text-end">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    {{__('ui.btn_rifiuta')}}
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('ui.confermi_?')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.btn_chiudi')}}</button>
                        <form action="{{ route('revisor.reject',['id' => $announcement->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">{{__('ui.btn_conferma')}}</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <form action="{{ route('revisor.accept',['id' => $announcement->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">{{__('ui.btn_accetta')}}</button>
                </form>
            </div>
        </div>
    </div>


</x-layout>