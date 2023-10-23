<!DOCTYPE html>
<html lang="en">

  <head>

   @include('home.css')

    </head>
    
        <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{url('/')}}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="{{url('/about')}}">About</a></li>
                           	
                            <li class="scroll-to-section"><a href="{{url('/all_meal_menu')}}">Menu</a></li>
                            <li class="scroll-to-section"><a href="{{url('/all_show_chefs')}}">Chefs</a></li> 
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="{{url('/book_reservation')}}">Book Reservation</a></li>

                            @if(Route::has('login'))

                            @auth
                                <li class="scroll-to-section"><a href="{{url('my_reservation')}}">My Reservation</a></li>
                                <li class="scroll-to-section"><a href="{{url('cart')}}">Cart ({{$count}})</a></li>    
                                <li class="scroll-to-section"><x-app-layout> </x-app-layout></li>                                    
                            @else
                            <li class="scroll-to-section"><a href="{{ route('login') }}">Login</a></li>
                            <li class="scroll-to-section"><a href="{{ route('register') }}">Register</a></li> 
                            @endauth
                            @endif
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
