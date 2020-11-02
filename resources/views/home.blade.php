@extends('layouts.app')
@section('body')
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        @if (session()->has('message'))
                                <p style="color: red">{{session('message')}}</p><br>
                                @endif
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{url('register')}}" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="fname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input required type="text" name="fname" id="fname" placeholder="Your First Name"/>
                                
                                
                            </div>
                            @if (session()->has('fname_l'))
                                <p style="color: red">{{session('fname_l')}}</p><br>
                                @endif
                            <div class="form-group">
                                <label for="lname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input required type="text" name="lname" id="lname" placeholder="Your Last Name"/>
                                
                            </div>
                            @if (session()->has('lname_l'))
                                <p style="color: red">{{session('lname_l')}}</p><br>
                                @endif
                            <div class="form-group">
                                <label for="organization"><i class="fas fa-building"></i></label>
                                <input required type="text" name="organization" id="organization" placeholder=" Name of organization"/>
                            </div>
                            <div class="form-group">
                                <label for="street"><i class="fa fa-street-view" style='font-size:16px'></i></label>
                                <input required type="text" name="street" id="street" placeholder=" Street"/>
                            </div>
                            <div class="form-group">
                                <label for="city"><i style='font-size:16px'class='fas fa-city'></i></label>
                                <input required type="text" name="city" id="city" placeholder=" City"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input required type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="m_number"><i class="fa fa-phone"></i></label>
                                <input required type="text" name="m_number" id="m_number" placeholder=" Mobile Number"/><br>
                                
                            </div>
                            @if (session()->has('phone_l'))
                                <p style="color: red">{{session('phone_l')}}</p><br>
                                @endif
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input required type="password" name="pass" id="pass" placeholder="Password"/><br>
                               
                            </div>
                            @if (session()->has('pass'))
                            <p style="color: red">{{session('pass')}}</p><br>
                            @endif
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input required type="password" name="re_pass" id="re_pass" placeholder="Confirm Password"/>
                                
                            </div>
                            @if (session()->has('confirm'))
                                <p style="color: red">{{session('confirm')}}</p><br>
                                @endif
                            <div class="form-group form-button">
                                <input required type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                                
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="{{url('login')}}" class="signup-image-link"><h3>I am already member</h3> </a>
                        
                    </div>
                </div>
            </div>
        </section>
       
  @endsection