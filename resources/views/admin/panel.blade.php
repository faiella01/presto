<x-layout>
    
<div class="container containerTablePanel mt-5 pt-4">
    <section class="tabella">
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th class="text-center">#ID</th>
                        <th class="tableUsername text-center">{{__('ui.utente_ad')}}</th>
                        <th class="text-center">{{__('ui.imposta_revisore')}}</th>
                        <th class="text-center"> {{__('ui.elimina_utente')}} </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    @foreach ($users as $user)
                    <tr class="sfondoRighe">
                        <td class="text-center"><h5>{{ $user->id }}</h5></td>
                        <td class="tableUsername text-center">
                            <p class="mb-0 mt-2">{{ $user->name }}</p>
                            @if($user->is_revisor == true)
                                <p class="mb-2">{{__('ui.ruolo_revisore')}}</p>
                            @else
                                <p class="mb-2">{{__('ui.ruolo_noRevisore')}}</p>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-grid gap-2 ">
                                @if($user->is_revisor == false)
                                <form action="{{route('admin.revisor.accept', ['id'=> $user->id])}}" method="post">
                                    @csrf
                                    <button class="btn btn-success checkAdminOn" type="submit"><i class="bi bi-check-circle"></i></button>
                                </form>
                                @else
                                <form action="{{ route('admin.revisor.delete', ['id'=> $user->id])}}" method="post">
                                    @csrf    
                                    <button class="btn btn-danger checkAdminOff" type="submit"><i class="bi bi-check-circle"></i></button>
                                </form>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-grid gap-2 ">
                                <form action="{{route('admin.deleteUser',['id' => $user->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger checkAdminOff"><i class="bi bi-x-circle"></i></a>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>

</x-layout>