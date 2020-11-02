@extends('layouts.app')
@section('body')
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="{{url('/')}}" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">

                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form" action="{{url('loginUser')}}">
                            @csrf
                            <div class="form-group">
                                <label for="your_phone"><i class="fa fa-phone"></i></label>
                                <input type="text" name="your_phone" id="your_phone" placeholder="Your Phone Number"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            @if (session()->has('message'))
                                <p style="color: red">{{session('message')}}</p><br>
                                @endif
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

  @endsection