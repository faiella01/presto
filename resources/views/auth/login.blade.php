<x-layout>  
    <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5 text-dark">
              <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fs-5">{{__('ui.accedi')}}</h5>
                <form method="post" action="{{route('login')}}">
                    @csrf
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
                    <label for="floatingInput">Email</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                    <label for="floatingPassword">Password</label>
                  </div>
    
                  <div class="d-grid">
                    <button class="btn btn-primary btn-login text-uppercase fw-bold tasti" type="submit">{{__('ui.login')}}</button>
                  </div>
                  <a class="d-block text-center mt-2 small nav-link-foot" href="{{route('register')}}">{{__('ui.frase_registrati')}}</a>
                  <hr class="my-4">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


</x-layout> 