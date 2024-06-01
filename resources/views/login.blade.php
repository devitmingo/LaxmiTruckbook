@extends('layouts.login-app')
@section('body')

     <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-start">
                            <a href="{{ route('login') }}" class="logo-dark">
                                <h4>Shiva Tradelink</h4>
                            </a>
                            
                           
                        </div>
                        <x-alert />
                        <!-- title-->
                        <h4 class="mt-0">Sign In</h4>
                       
                        <!-- form -->
                        <form action="{{ route('loginPost') }}" method="post" >
                        @csrf
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" id="email" name="email" required="" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                            </div>
                            <div class=" mb-3">
                            <label for="password" class="form-label">Company</label>
                                    <select id="company" name="company" class="form-control">
                                        <option>--Choose Company--</option>
                                        @foreach($company as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <script>document.getElementById("company").value = "{{ old('company',isset($data->company) ? $data->company : '' )}}"; </script>
                            </div>     
                            <div class="mb-3">
                            <label for="password" class="form-label">Session</label>
                                    <select id="session" name="session" class="form-control">
                                        <option>--Choose session--</option>
                                            @foreach($session as $row)
                                                <option value="{{ $row->id }}">{{ $row->session_name }}</option>
                                            @endforeach
                                        </select>
                                    <script>document.getElementById("session").value = "{{ old('session',isset($data->session) ? $data->session : '' )}}"; </script>
                            </div> 
</br>                         
                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Log In </button>
                            </div>
                           
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <!-- <footer class="footer footer-alt">
                            <p class="text-muted">Don't have an account? <a href="pages-register-2.html" class="text-muted ms-1"><b>Sign Up</b></a></p>
                        </footer> -->

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>

@endsection