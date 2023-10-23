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
                                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('search_order')}}" method="get">
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
                                    <h1 class="card-title" style="text-align:center; font-size:40px;">All User Orders</h1>
                                    <div class="table-responsive">
                                    <table class="table">
                                            <thead>
                                                <tr class="th_deg">
                                                    <th>Order By Name</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Date</th>
                                                    <th>Food Name</th>
                                                    <th>Food Price</th>
                                                    <th>Quantity</th>
                                                    <th>Status</th>
                                                    <th>Reject</th>
                                                    <th>Accept</th>
                                                    <th>Delete</th>
                                                    <th>Send Mail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach($order as $order)
                                                <tr>
                                                    <td>{{$order->name}}</td>
                                                    <td>{{$order->phone}}</td>
                                                    <td>{{$order->address}}</td>
                                                    <td>{{$order->created_at}}</td>
                                                    <td>{{$order->foodname}}</td>
                                                    <td>{{$order->price}}</td>
                                                    <td>{{$order->quantity}}</td>
                                                    <td>{{$order->status}}</td>
                                                    <td><a href="{{url('reject_order',$order->id)}}" class="btn btn-primary">Reject</a></td>
                                                    <td><a href="{{url('accept_order',$order->id)}}" class="btn btn-secondary">Accept</a></td>
                                                    <td><a href="{{url('delete_order',$order->id)}}" class="btn btn-danger">Delete</a></td>
                                                    <td><a href="{{url('send_mail',$order->id)}}" class="btn btn-success">Send Mail</a></td>
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