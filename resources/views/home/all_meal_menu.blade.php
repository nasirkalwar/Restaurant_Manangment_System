@include('home.header')
<!-- ***** Header Area End ***** -->

<section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Klassy Week</h6>
                        <h2>This Week’s Special Meal Offers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <ul>
                                          <li><a href='#tabs-1'><img src="assets/images/tab-icon-01.png" alt="">Breakfast</a></li>
                                          <li><a href='#tabs-2'><img src="assets/images/tab-icon-02.png" alt="">Lunch</a></a></li>
                                          <li><a href='#tabs-3'><img src="assets/images/tab-icon-03.png" alt="">Dinner</a></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <section class='tabs-content'>
            


                                <article >
                                    <div class="row">
                                        <div class="">
                                            <div class="row">
                                            @foreach($meal as $meals)
                                            <div class="left-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="mealimage/{{$meals->file}}" alt="Image">
                                                            <h4>{{$meals->title}}</h4><h4>  <b>{{$meals->type}}</b></h4>
                                                            <p>{{$meals->description}}</p>
                                                            <div class="price">
                                                                <h6>Rs.{{$meals->price}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                               
                                                </div>
                                                @endforeach
                                               
                                            </div>
                                        </div>
                                        <span style="padding-top:20px;">
                                                    {!!$meal->withQueryString()->links('pagination::bootstrap-5')!!}
                                                </span>                              
                                    </div>
                                </article>  
            
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






@include('home.script')