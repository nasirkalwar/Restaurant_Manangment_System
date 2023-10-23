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
                                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('search_chef')}}" method="get">
                                    @csrf
                                    <input type="text" class="form-control" name="search" placeholder="Search Chef By Name & Chef Category" style="text-align:center;">
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
                                    <h1 class="card-title" style="text-align:center; font-size:40px;">All Chefs</h1>
                                    <div class="table-responsive">
                                    <table class="table">
                                            <thead>
                                            <tr class="th_deg">
                                                <th>chef Title</th>
                                                <th>Description</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Delete</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>		
                                        <tbody>
                                        @foreach($chef as $chef)
                                            <tr>
                                            <td>{{$chef->name}}</td>
                                                <td>{{$chef->description}}</td>
                                                <td>{{$chef->category}}</td>
                                                <td><img class="img_deg" src="/chefimage/{{$chef->file}}"></td>
                                                <td><a href="{{url('delete_chef',$chef->id)}}" class="btn btn-danger">Delete</a></td>
                                                <td><a href="{{url('edit_chef',$chef->id)}}" class="btn btn-primary">Edit</a></td>
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