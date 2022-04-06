<x-layout>


<form action="{{route('contact.send')}}" method="post">
@csrf
    <div class="wrapper centered my-5">
    <article class="letter">
        <div class="side">
        <h1>{{__('ui.contattaci')}}</h1>
        <p>
            @error('message')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
            <textarea name="message" class="customTextarea @error('message') is-invalid @enderror" placeholder="Your message">
                {{ old('message') }}
            </textarea>
        </p>
        </div>
        <div class="side">
            @error('name')
            <div class=" text-danger mt-4">{{ $message }}</div>
            @enderror
        <p>
            <input name="name" class="customInput @error('name') is-invalid @enderror" type="text" value="{{ Auth::user()->name }}">
        </p>
        
        @error('email')
        <div class=" text-danger">{{ $message }}</div>
        @enderror
        <p>
            <input name="email" class="customInput @error('email') is-invalid @enderror" type="email" value="{{ Auth::user()->email }}">
        </p>

        <p>
            <button type="submit" class="customButton" id="sendLetter">{{__('ui.invia')}}</button>
        </p>
        </div>
    </article>
    <div class="envelope front"></div>
    <div class="envelope back"></div>
    </div>
    <p class="result-message centered text-center mt-5">{{__('ui.grazie_messaggio')}}</p>
</form>

</x-layout>
