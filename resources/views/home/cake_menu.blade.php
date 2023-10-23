<section class="section" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Menu</h6>
                        <h2>Our selection of Cakes with quality taste</h2>
                    </div>
                </div>
            </div>
        </div>

        @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session()->get('message')}}
                    </div>

                @endif

        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                @foreach($food as $food)
                <form action="{{url('/add_cart',$food->id)}}" method="post">
                    @csrf
                <div class="item">
                        <div style="background-image:url('/foodimage/{{$food->file}}');" class='card '>
                            <div class="price"><h6>Rs.{{$food->price}}</h6></div>
                            <div class='info'>
                              <h1 class='title'>{{$food->title}}</h1>
                              <p class='description'>{{$food->description}}</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>

                            <Input type="number" name="price"  value="{{$food->price}}" requried="" hidden="">
                            <Input type="number" name="quantity" min="1" value="1" requried="" placeholder="write quantity">
                            <button type="submit" class="btn btn-primary">Add Cart</button>
                        </form>
                    </div>
                    @endforeach
                    
                    
                </div>
            </div>
        </div>
    </section>
