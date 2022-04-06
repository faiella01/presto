<x-layout>
    <h2 class="my-4 text-center">Gli annunci che corrispondono alla ricerca: {{$q}}</h2>
    <div class="container">
        <div class="row">
            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-6 col-lg-4">
                    <x-card
                    :announcement="$announcement"
                    ></x-card>
                </div>
            @endforeach

            {{-- {{ $announcements->links() }} --}}
        </div>
    </div>
</x-layout>