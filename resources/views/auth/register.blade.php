<x-layout>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 mx-auto">
				<div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden text-dark">
					<div class="card-img-left d-none d-md-flex">
						<!-- Background image for card set in CSS! -->
					</div>
					<div class="card-body p-4 p-sm-5">
						<h5 class="card-title text-center mb-5 fs-5"> {{__('ui.registrati')}}</h5>
						<form method="post" action="{{route('register')}}">
							@csrf
							
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="floatingInputUsername" placeholder="myusername" autofocus name="name" value="{{ old('name') }}" required>
								<label>Username</label>
							</div>
							
							<div class="form-floating mb-3">
								<input type="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com" name="email" value="{{ old('email') }}" required>
								<label for="floatingInputEmail">Email</label>
							</div>
							
							<hr>
							
							<div class="form-floating mb-3">
								<input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
								<label for="floatingPassword">Password</label>
							</div>
							
							<div class="form-floating mb-3">
								<input type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password" name="password_confirmation" required>
								<label for="floatingPasswordConfirm">{{__('ui.conferma_password')}}</label>
							</div>
							
							<div class="d-grid mb-2">
								<button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase tasti" type="submit">{{__('ui.registrati')}}</button>
							</div>
							
							<a class="d-block text-center mt-2 small nav-link-foot" href="{{route('login')}}">{{__('ui.frase_login')}}</a>
							
							<hr class="my-4">
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
</x-layout>