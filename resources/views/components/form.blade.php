<form method="POST" action="{{route('announcement.store')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
  
  
  <!-- Name Input -->
  <div class="mb-3">
    <label class="form-label">{{__('ui.nome_prodotto')}}</label>
    <input class="shadow-form form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{old('title')}}"/>
    @error('title')
    <div class=" text-danger">{{ $message }}</div>
    @enderror
  </div>
  
  {{-- Select per la categoria --}}
  <label>{{__('ui.scegli_categoria')}}</label>
  <select class="form-select my-2" aria-label="Default select example" name="category" >
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
  </select>
  
  <!-- Message Input -->
  <label class="form-label mt-3">{{__('ui.descrivi_prodotto')}}</label>
  <textarea name="body" class="p-3 form-control @error('body') is-invalid @enderror" cols="10" row="10" placeholder="{{__('ui.placeholder_prodotto')}}">{{old('body')}}</textarea>
  @error('body')
  <div class=" text-danger">{{ $message }}</div>
  @enderror
  
  
  
  {{-- Price input  --}}
  <label class="form-label mt-3">{{__('ui.prezzo')}}</label>
  <div class="input-group mb-3">
    <span class="input-group-text">€</span>
    <input type="number" class="form-control @error('price') is-invalid @enderror" step="0.01" name="price"  value="{{old('price')}}" aria-label="Amount (to the nearest dollar)">
  </div>
  @error('price')
  <div class=" text-danger">{{ $message }}</div>
  @enderror
  
  
  <div class="form-group row">
    <label for="images" class="col-12 form-label">
      {{__('ui.immagini')}}
    </label>
    <div class="col-md-12">
      <div class="dropzone" id="drophere">
        @error('images')
        <span class="invalid-feeback" role="alert">
          <strong>{{$message}}</strong>
        </span>
        @enderror
      </div>
    </div>
  </div>
  
  <!-- Submit button -->
  <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary tasti">{{__('ui.inserisci')}}</button>
  </div>
</form>
<!-- End of contact form -->
