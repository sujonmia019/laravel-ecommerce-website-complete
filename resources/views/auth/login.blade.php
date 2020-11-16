
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

<!------ Include the above in your HEAD tag ---------->

<div class="login-form bg-dark d-flex align-items-center" style="height: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <div class="card shadow-lg rounded-0">
                    <div class="card-header">
                        <h2 class="m-0 text-dark text-center">Admin Login</h2>
                    </div>
                    <div class="card-body">

                        <div class="bg-danger">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <ul class="m-0 text-white py-1">
                                        <li>{{$error}}</li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="needs-validation m-0">
                        @csrf
                            <div class="form-group">
                                <label>E-mail</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0"><i class="fas fa-envelope"></i></span>
                                    </div>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror rounded-0" name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email" autofocus>

                                    <div class="invalid-feedback">
                                    E-mail field is required.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0"><i class="fas fa-key"></i></span>
                                    </div>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                    <div class="invalid-feedback">
                                    Password field is required.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-dark" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Login" class="btn btn-primary btn-block rounded-0">
                            </div>

                            <div class="text-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
(function() {
  'use strict';
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
            }
        @endif

  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>



