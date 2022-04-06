<x-layout>
	
	@if (\App\Models\Announcement::ToBeRevisionedCount() != 0)
	
	<div class="container mt-5">
		<section class="tabella">
			<div class="tbl-header">
				<table cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
							<th class="text-center">#ID</th>
							<th>{{__('ui.autore')}}</th>
							<th class="">{{__('ui.titolo_annuncio')}}</th>
							<th class="descrizioneTabella">{{__('ui.categoria_rev')}}</th>
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
							<td class="text-center">{{$announcement->user->id}}</td>
							<td>{{$announcement->user->name}}</td>
							<td class="">{!! substr($announcement->title, 0, 50) !!}</td>
							<td class="descrizioneTabella">{{$announcement->category->name}}</td>
							<td class="text-center">
								<button type="button" class="btn btn-warning checkAdminModify">
									<a href="{{route('revisor.detail',['id' => $announcement->id])}}" class="text-decoration-none text-dark"><i class="bi bi-tools"></i></a>
								</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</section>
	</div>
	
	@else
	<h2 class="text-center mt-5">{{__('ui.no_articoli_revisione')}}</h2>
	@endif
	
	
	
</x-layout>