<x-layout>



<h1 class="text-center my-5">
    {{__('ui.modifica_annuncio')}}
</h1>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-m-6">
            <form action="{{route('announcement.update',['id'=>$announcement->id])}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf 
                <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
                <div class="mb-3">
                    <label class="form-label" >{{__('ui.titolo_mod')}}</label>
                    <input type="text" name="title" class="form-control" value="{{$announcement->title}}">
                </div>
                
                
                <div class="mb-3">
                    <label class="form-label">{{__('ui.categoria_mod')}}</label>
                    <select name="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $announcement->category->id ? "selected" : ""}}>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                    
                    
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.prezzo_mod')}}</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{$announcement->price}}">
                    </div>   
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.corpo')}}</label>
                        <textarea type="text" name="body" class="form-control">{{$announcement->body}}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3>{{__('ui.gestisci_immagini')}}</h3>
                        </div>
                    </div>
{{--                     @foreach ($announcement->images as $image)
                    <img src="{{$announcement->images->first()->getUrl(300,150)}}" alt="">
                    @endforeach --}}
                    <div class="dropzone my-4" id="drophere">
                        @error('images')
                        <span class="invalid-feeback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="d-flex justify-content-center">
                        <form action="{{route('announcement.update', ['id'=>$announcement->id])}}" method="post">
                        @method('put')
                        @csrf
                        <button type="submit" class="btn btn-primary tasti bottoneModifica">{{__('ui.btn_modifica')}}</button>
                    </form>
                    </div>

                </form>
                <div class="container-fluid">
                    <div class="row mb-5 pb-5 justify-content-center align-items-center">
                        @foreach ($announcement->images as $image)
                            <div class="col-12 col-lg-4 d-flex flex-column align-items-center">
                                <img src="{{$image->getUrl(300,200)}}" alt="">
                                <form action="{{route('image.delete', ['id'=>$image->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger checkAdminOff mt-2 mb-4"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    

</x-layout>