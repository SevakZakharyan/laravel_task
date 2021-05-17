<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url('app/dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            

            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Charts -->
            @can('isUser')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/app/user/'.$user['id'].'/edit') }}">
                  <i class="fas fa-user-plus"></i>
                    <span>Edit Profile</span></a>
            </li>
            @endcan

            @canany(['isAdmin','isManager'])
            <li class="nav-item">
                <a class="nav-link" href="{{ url('app/create/user') }}">
                  <i class="fas fa-user-plus"></i>
                    <span>Create User</span></a>
            </li>
            @endcanany

            @can('isAdmin')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('app/question') }}">
                 <i class="far fa-plus-square"></i>
                    <span>Make Question</span></a>
            </li>
            @endcan

            @canany(['isAdmin','isManager'])
            <li class="nav-item">
                <a class="nav-link" href="{{url('app/answers')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Answers</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('app/charts')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>
            @endcanany


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                       
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$user['name']}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/logout') }}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                        
                    </div>

                    <!-- Content Row -->
                        <div class="row">

                        <div class="ml-3 "> 
                                <p class="mb-0 text-red-800 ">id - {{$user['id']}} / role - {{$user['role']}} / name - {{$user['name']}}</p>
                        </div>

                        


                        <!-- Content Row -->





                        </div>

                        <div class="row">
                        @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <div style="color:red; margin-top:10px; padding-left: 20px;"> {{$error}} </div>
                                    @endforeach
                            @elseif(Session::get('success'))
                                    <div style="padding-left: 20px;">
                                        <p style="color:green; margin-top:10px;">{{ Session::get('success') }}</p>
                                    
                                    </div> 
                            @endif

                        </div>

                        <div class="row">

                        <div class="col">
                            <ul class="list-group">
                            @can('isAdmin')
                                @foreach($userlist as $userL)

                                    <li class=" list-group-item  m-3">
                                        @if(!is_null($userL['suspended_at']))
                                            <span class="badge badge-success" role="alert">User Account is Active</span>
                                        @else
                                            <span class="abadge badge-secondary" role="alert">User Account is Disabled</span>
                                        @endif
                                        <span class=""> Name - {{$userL['name']}}  // Email - {{$userL['email']}} // Role - {{$userL['role']}} </span>
                                        
                                        <a href="{{ url('/app/user/'.$userL['id'].'/delete') }}" class="float-right mr-3 text-danger">Delete</a>
                                        @if(!is_null($userL['suspended_at']))
                                        <a href="{{ url('/app/user/'.$userL['id'].'/unsuspend') }}" class="float-right mr-3 text-muted">Un-Suspend</a>
                                        @else
                                        <a href="{{ url('/app/user/'.$userL['id'].'/suspend') }}" class="float-right mr-3 text-success">Suspend</a>
                                        @endif
                                        <a href="{{ url('/app/user/'.$userL['id'].'/edit') }}" class="float-right mr-3 text-success">Edit</a>

                                    </li>
                                    
                                @endforeach
                            @endcan

                            @can('isManager')
                                @foreach($userlist as $userL)
                                    @if($userL->role == 'user')
                                    <li class=" list-group-item  m-3">
                                        @if(!is_null($userL['suspended_at']))
                                            <span class="badge badge-success" role="alert">User Account is Active</span>
                                        @else
                                            <span class="abadge badge-secondary" role="alert">User Account is Disabled</span>
                                        @endif
                                        <span class=""> Name - {{$userL['name']}}  // Email - {{$userL['email']}} // Role - {{$userL['role']}} </span>
                                        
                                        <a href="{{ url('/app/user/'.$userL['id'].'/delete') }}" class="float-right mr-3 text-danger">Delete</a>
                                        @if(!is_null($userL['suspended_at']))
                                        <a href="{{ url('/app/user/'.$userL['id'].'/unsuspend') }}" class="float-right mr-3 text-muted">Un-Suspend</a>
                                        @else
                                        <a href="{{ url('/app/user/'.$userL['id'].'/suspend') }}" class="float-right mr-3 text-success">Suspend</a>
                                        @endif
                                        <a href="{{ url('/app/user/'.$userL['id'].'/edit') }}" class="float-right mr-3 text-success">Edit</a>

                                    </li>
                                    @endif
                                    
                                @endforeach
                            @endcan

                            @can('isUser')  
                                @foreach($questions as $question)
                                {{$question->id }} 
                                        <div style="margin: 10px;"> 
                                            <span><b>Question</b> - {{$question->question }} </span>  
                                            <span>
                                                <form method="POST" action="{{ url('app/question/'.$question->id.'/save') }}" style="display: inline-block; margin-left: 20px;">
                                                    @csrf
                                                    @if($question->answer_type == 'percentage')
                                                        <input type="number" name="percentage" min="0" max="100" id="myPercent" placeholder="Enter percent value" style="width: 100px;">

                                                        <script>
                                                            document.getElementById('myForm').onsubmit = function() {
                                                                var valInDecimals = document.getElementById('myPercent').value / 100;
                                                            }
                                                        </script>

                                                    @elseif($question->answer_type == 'number')

                                                    <input type="number" id="quantity" name="number" min="0" style="width: 100px;" placeholder="Enter Number">

                                                    @elseif($question->answer_type == 'yesno_m')

                                                    <input type="radio" name="yesno_m" value="yes" checked>Yes</input>
                                                    <input type="radio" name="yesno_m" value="no">No</input>
                                                    <input type="radio" name="yesno_m" value="maybe">Maybe</input>
                                                    @endif
                                                    
                                                    <input type="submit" value="Answer" style="color:green;">
                                                </form>
                                            </span>
                                    
                                        </div>
                  
                                @endforeach
                            @endcan
                            </ul>
                        </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>