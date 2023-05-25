<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Halaman Login Admin</title>
</head>
<body>
    <h2>Login Admin</h2>
    <form method="post" action="{{ route('admin.login') }}" novalidate>
        @csrf
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required/>
          <label class="form-label" for="email">Email address</label>
          @error('email')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
      
        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="password" name="password" class="form-control @error('email') is-invalid @enderror" required/>
          <label class="form-label" for="password">Password</label>
          @error('password')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">{{__('login') }}</button>
      </form>
</body>
</html>