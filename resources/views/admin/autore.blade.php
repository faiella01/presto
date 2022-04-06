<x-layout>
<div class="container">
	@if ( \App\Models\Announcement::ToBeRevisionedCountAcc() > 0 )
		<h2 class="text-center mb-4 mt-5">
			{{__('ui.tutti_annunci')}}
		</h2>
		<section class="tabella">
			<div class="tbl-header">
				<table cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
							<th class="text-center tableId">#ID</th>
							<th class="text-center descrizioneTabella">{{__('ui.utente_ad')}}</th>
							<th>{{__('ui.titolo_ann')}}</th>
							<th class="text-center">{{__('ui.categoria_ann')}}</th>
							<th class="descrizioneTabella">{{__('ui.descrizione_ann')}}</th>
							<th class="text-center">{{__('ui.actions')}}</th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="tbl-content">
				<table cellpadding="0" cellspacing="0" border="0">
					<tbody>
						@foreach ($announcements as $announcement)
							<tr class="sfondoRighe">
								<td class="text-center tableId">{{$announcement->id}}</td>
								@if($announcement->category!=null)
									<td class="text-center descrizioneTabella">{{ substr($announcement->user->name, 0, 10) }}</td>
								@else
									<td class="text-center descrizioneTabella">Bradipi</td>
								@endif
								<td>{{$announcement->title}}</td>
								@if($announcement->category!=null)
									<td class="text-center">{{$announcement->category->name}}</td>
								@else
									<td class="text-center">
										{{__('ui.senza_categoria')}}
									</td>
								@endif
								<td class="descrizioneTabella"> {{substr($announcement->body,0,30)}}..</td>
								<td class="d-flex justify-content-evenly align-items-center tableActions">
									<button type="button" class="btn btn-success checkAdminOn bottoneDifettoso">
										<a href="{{ route('admin.show', ['id'=>$announcement->id]) }}" class="text-decoration-none text-white"><i class="bi bi-eye"></i></a>
									</button>
									<form action="{{route('announcement.delete',['id' => $announcement->id])}}" method="POST">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-danger checkAdminOff"><i class="bi bi-trash"></i></a>
										</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</section>
	@else
		<h3 class="text-center mt-5">
			{{__('ui.non_ci_sono_annunci')}}
		</h3>
	@endif
</div>
    
</x-layout>