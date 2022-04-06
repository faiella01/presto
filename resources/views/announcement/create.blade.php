<x-layout title="{{__('ui.crea')}}" >


    <h1 class="text-center my-3">
        {{__('ui.crea')}}
    </h1>

    

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <x-form
                uniqueSecret="{{$uniqueSecret}}"
                />
                
            </div> 
        </div>
    </div>




</x-layout>