<form action="{{route('locale',$lang)}}" method="post">
    @csrf
    <button type="submit" class="nav-link btn-outline-main btn band-{{$nation}}">
    </button>
</form>