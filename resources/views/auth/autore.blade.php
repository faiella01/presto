<x-layout>

<div class="container">
	@if ( \App\Models\Announcement::ToBeRevisionedCountIdAcc(Auth::user()->id) > 0 )
		<h2 class="text-center mb-4 mt-5">
			{{__('ui.miei_annunci')}}
		</h2>
		<section class="tabella">
			<div class="tbl-header">
				<table cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
							<th>{{__('ui.titolo')}}</th>
							<th class="text-center">{{__('ui.categoria_user')}}</th>
							<th class="descrizioneTabella">{{__('ui.descrizione')}}</th>
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
									<button type="button" class="btn btn-warning checkAdminModify mb-1 mb-md-0">
										<a href="{{route('announcement.edit',['id'=>$announcement->id])}}" class="text-decoration-none text-dark"><i class="bi bi-pencil-square"></i></a>
									</button>
									<form action="{{route('announcement.delete',['id' => $announcement->id])}}" method="POST">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-danger checkAdminOff"><i class="bi bi-trash"></i></a>
										</button>
										<br>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</section>
		<h3 class="text-center mt-5">
			{{__('ui.annunci_da_revisionare')}} {{ \App\Models\Announcement::ToBeRevisionedCountId(Auth::user()->id) }}
		</h3>
	@elseif (count(Auth::user()->announcements) == 0)
		<h3 class="text-center mt-5">
			{{__('ui.crea_tuo_annuncio')}} 
		</h3>
		<div class="text-center mt-4">
			<a href="{{route('announcement.create')}}">
				<button class="btn btn-primary tasti">{{__('ui.inizia_ora')}}</button>
			</a>
		</div>
	@else
		<h3 class="text-center mt-5">
			{{__('ui.annunci_da_revisionare')}} {{ \App\Models\Announcement::ToBeRevisionedCountId(Auth::user()->id) }}
		</h3>
	@endif
</div>
    
</x-layout>
    