@include('admin.header')
<body>
    <div class="container-scroller">
        @include('admin.slidebar')
        <!-- partial -->
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->

            <div class="container-fluid page-body-wrapper">
        
                <div class="content-wrapper">

                <div >
                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100">
                                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('search_reservation')}}" method="get">
                                    @csrf
                                    <input type="text" class="form-control" name="search" placeholder="Search User Name & Food Name" style="text-align:center;">
                                    <button type="submit" class="btn btn-primary" style="width:10%;">Search</button>
                                </form>
                            </li>
                            
                        </ul>
                    </div>
                


                    @if (session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{session()->get('message')}}
                            </div>

                            @endif 


                      <div class="row ">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                <div class="card-body">
                                    <h1 class="card-title" style="text-align:center; font-size:40px;">All Reservations</h1>
                                    <div class="table-responsive">
                                    <table class="table">
                                            <thead>
                                            <tr class="th_deg">
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Guests</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Message</th>
                                                        <th>Status</th>
                                                        <th>Reject</th>
                                                        <th>Accept</th>
                                                        <th>Delete</th>
                                                        <th>Edit</th>
                                                        <th>Send Mail</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($reservation as $reservation)
                                                    <tr>
                                                        <td>{{$reservation->name}}</td>
                                                        <td>{{$reservation->email}}</td>
                                                        <td>{{$reservation->phone}}</td>
                                                        <td>{{$reservation->guests}}</td>
                                                        <td>{{$reservation->date}}</td>
                                                        <td>{{$reservation->time}}</td>
                                                        <td>{{$reservation->message}}</td>
                                                        <td>{{$reservation->status}}</td>
                                                        <td><a href="{{url('reject_reservation',$reservation->id)}}" class="btn btn-primary">Reject</a></td>
                                                        <td><a href="{{url('accept_reservation',$reservation->id)}}" class="btn btn-secondary">Accept</a></td>
                                                        <td><a href="{{url('delete_reservation',$reservation->id)}}" class="btn btn-danger">Delete</a></td>
                                                        <td><a href="" class="btn btn-primary">Edit</a></td>
                                                        <td><a href="{{url('send_mail',$reservation->id)}}" class="btn btn-success">Send Mail</a></td>
                                                    </tr>
                                                    @endforeach     
                                                </tbody>
                                            
                                            </table>

                                            </div>
                                    </div>
                                </div>
                            </div>
                




                </div>
            </div>

    </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
       @include('admin.footer')