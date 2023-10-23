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
                                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('search_user')}}" method="get">
                                    @csrf
                                    <input type="text" class="form-control" name="search" placeholder="Search User By Name & email " style="text-align:center;">
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
                                    <h1 class="card-title" style="text-align:center; font-size:40px;">All Users</h1>
                                    <div class="table-responsive">
                                    <table class="table">
                                            <thead>
                                            <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Delete</th>
                                                <th>Send Mail</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                        @foreach($user as $user)
                                                        <tr>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td>{{$user->usertype}}</td>
                                                            @if($user->usertype=='0')
                                                            <td><a href="{{url('/deleteuser',$user->id)}}" class="btn btn-danger">Delete</a></td>
                                                            <td><a href="{{url('/sendmail',$user->id)}}" class="btn btn-success">Send Mail</a></td>
                                                            @else
                                                            <td>Not Allowed</td>
                                                            <td>Not Allowed</td>
                                                            @endif
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