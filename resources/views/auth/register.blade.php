@extends('base')

@section('title', 'Register')

<div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #3b82f6;">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 10px;">
        <div class="card-body">
            <h3 class="text-center   mb-5 text-dark">Register</h3>
            <form action="{{route('registration')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" required>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                </div>

                <hr class="text-white">

                <button type="submit" class="btn btn-primary w-100">Register</button>

                <div class="text-center mt-3">
                    <a class="text-light text-decoration-none" href="#">Already have an account?</a>
                </div>
            </form>
        </div>
    </div>
</div>