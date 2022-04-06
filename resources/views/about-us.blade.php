<x-layout>
	
	@if (session('message'))
	<div class="alert alert-success">
		{{ session('message') }}
	</div>
	@endif
	
	<div class="container mt-3">
		<div class="row">
			<div class="col-12 col-md-5 pe-4 pt-5">
				<h2>{{__('ui.chi_siamo')}}</h2>
				<p>
					{{__('ui.descrizione_bradipiFoundation')}}
				</p>
			</div>
			<div class="col-12 col-md-7 ps-4 pt-5">
				<h2>{{__('ui.contattaci')}}</h2>
				<form action="{{route('about.send')}}" method="post">
					@csrf
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">{{__('ui.indirizzo_email')}}</label>
						<input class="shadow-form form-control" type="text" name="email"/>
					</div>
					
					<div>
						<label class="form-label mt-3">{{__('ui.scrivi_messaggio')}}</label>
						<textarea name="body" class="p-3 form-control" required cols="10" row="10" placeholder="" ></textarea>
						<button type="submit" class="btn btn-primary tasti mt-3">{{__('ui.invia')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="container mt-5 pt-4">
		<h2>
			{{__('ui.il_nostro_team')}}
		</h2>
		<div class="row justify-content-evenly">
			
			<div class="col-12 col-lg-3 col-md-6 mb-5 mt-md-0 mt-3">
				<div class="card">
					<img src="./media/dennis.jpg" class="card-img-top" alt="...">
					<div class="card-body cardAbout">
						<h5 class="card-title">Dennis Betianu</h5>
						<p class="card-text">
							{{__('ui.dennis_descrizione')}}
						</p>
					</div>
					<div class="card-body">
						<a href="#" class="card-link bi bi-envelope-open-heart">{{__('ui.contattami')}}</a>
						<a href="#" class="card-link bi bi-linkedin">My LinkedIn</a>
					</div>
				</div>
			</div>
			
			<div class="col-12 col-lg-3 col-md-6 mb-5">
				<div class="card">
					<img src="./media/davide.jpg" class="card-img-top" alt="...">
					<div class="card-body cardAbout">
						<h5 class="card-title">Davide Aulino</h5>
						<p class="card-text">
							{{__('ui.davide_descrizione')}}
						</p>
					</div>
					<div class="card-body">
						<a href="#" class="card-link bi bi-envelope-open-heart">{{__('ui.contattami')}}</a>
						<a href="#" class="card-link bi bi-linkedin">My LinkedIn</a>
					</div>
				</div>
			</div>
			
			<div class="col-12 col-lg-3 col-md-6 mb-5">
				<div class="card">
					<img src="./media/fabio.jpg" class="card-img-top" alt="...">
					<div class="card-body cardAbout">
						<h5 class="card-title">Fabio Faiella</h5>
						<p class="card-text">
							{{__('ui.fabio_descrizione')}}
						</p>
					</div>
					<div class="card-body">
						<a href="#" class="card-link bi bi-envelope-open-heart">{{__('ui.contattami')}}</a>
						<a href="#" class="card-link bi bi-linkedin">My LinkedIn</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-3 col-md-6 mb-5">
				<div class="card">
					<img src="./media/giuseppe.jpg" class="card-img-top" alt="...">
					<div class="card-body cardAbout">
						<h5 class="card-title">Giuseppe Mastrolonardo</h5>
						<p class="card-text">
							{{__('ui.giuseppe_descrizione')}}
						</p>
					</div>
					<div class="card-body">
						<a href="#" class="card-link bi bi-envelope-open-heart">{{__('ui.contattami')}}</a>
						<a href="#" class="card-link bi bi-linkedin">My LinkedIn</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="container mt-3">
		<div class="row">
			<div class="col-12">
				<h2>{{__('ui.nostra_sede')}}</h2>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.162046417146!2d12.490248315441455!3d41.88937197922127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x43783f21d22f2ed0!2zNDHCsDUzJzIxLjciTiAxMsKwMjknMzIuOCJF!5e0!3m2!1sit!2sit!4v1647761498606!5m2!1sit!2sit"  width="100%" height="450" style="border:0;" allowfullscreen="no" loading="lazy"></iframe>
			</div>
		</div>
	</div>
	
	{{-- WHATSAPP BUTTON --}}
	<div>
		<a href="https://api.whatsapp.com/send?phone=393391234567&text=%20Buongiorno%20Bradipi%20vorrei%20informazioni%20su%20..." class="float bi bi-whatsapp" target="_blank">
		</a>
	</div>
	
	
</x-layout>