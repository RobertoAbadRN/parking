<main class="login-form">
    <div class="container">
      <div class="flex justify-center">
        <div class="w-8/12">
          <div class="card">
            <div class="card-header">Reset Password</div>
            <div class="card-body">
              @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                  {{ Session::get('message') }}
                </div>
              @endif
              <form action="{{ route('forget.password.post') }}" method="POST">
                @csrf
                <div class="mb-4">
                  <label for="email_address" class="block text-right">E-Mail Address</label>
                  <div class="col-md-6">
                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                    @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                </div>
                <div class="flex justify-center">
                  <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  

