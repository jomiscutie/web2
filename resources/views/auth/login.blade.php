@extends('base')

@section('title', 'Log In')

<div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #3b82f6;">

    <div class="d-flex flex-column align-items-center">
        
        <div class="card shadow-sm p-4" style="width: 400px; border-radius: 10px;">
        <h3 class="text-center mb-3 text-dark">Log in</h3>
            <div class="card-body">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Log In</button>
                    <hr>
                    <div class="text-center">
                        <a href="{{route('auth.register')}}" class="">Register an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>