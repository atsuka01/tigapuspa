@extends('layouts.login')

@section('login')
<form action="{{ route('login')}}" method="post">
    {{csrf_field()}}
    <div class="form-group form-material floating" data-plugin="formMaterial">
        <input type="email" class="form-control" name="email" value="{{ old('email')}}" required autofocus/>
    <label class="floating-label">Email</label>
    </div>
    <div class="form-group form-material floating" data-plugin="formMaterial">
        <input type="password" class="form-control" name="password" required/>
        <label class="floating-label">Password</label>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Sign in</button>
</form>
@endsection
