<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('css/create-user.css')}}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Update User Form</h2>
                    <form method="POST"  action="{{ route('app.user.update') }}">
                        @csrf
                            
                            <input type="hidden" name="id" value="{{$user_data['id']}}">
                            

                        
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Name</label>
                                        <input class="input--style-4" type="text" name="name" value="{{$user_data['name']}}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Email</label>
                                        <input class="input--style-4" type="email" name="email" value="{{$user_data['email']}}">
                                    </div>
                                </div>

                            </div>
                            @can('isAdmin')
                            <div class="row row-space">
                                
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Role</label>
                                        <div class="p-t-10">
                                            <label class="radio-container m-r-45">Manager
                                                <input id="manager_input" type="radio"  name="role" value="manager" >
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container">User
                                                <input id="user_input" type="radio" name="role"  value="user">
                                                <span class="checkmark"></span>
                                            </label>
                                                @if($user_data['role'] == 'manager')
                                                    <script>document.getElementById("manager_input").checked = true;</script>
                                                @else
                                                    <script>document.getElementById("user_input").checked = true;</script>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Password</label>
                                        <input class="input--style-4" type="password" name="password">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Confirm Password</label>
                                        <input class="input--style-4" type="password" name="confirm_password">
                                    </div>
                                </div>
                            </div>

                            <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" type="submit">Update</button>
                            </div>

                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div style="color:red; margin-top:10px;"> {{$error}} </div>
                                @endforeach
                            @elseif(Session::get('success'))
                                <div>
                                    <p style="color:green; margin-top:10px;">{{ Session::get('success') }}</p>
                                    <a href="{{route('app.dashboard')}}" style="color:green;">Go To Dasheboard</a>
                                </div> 
                            @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{ asset('vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{ asset('vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script>
            (function ($) {
        'use strict';
        /*==================================================================
            [ Daterangepicker ]*/
        try {
            $('.js-datepicker').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoUpdateInput": false,
                locale: {
                    format: 'DD/MM/YYYY'
                },
            });
        
            var myCalendar = $('.js-datepicker');
            var isClick = 0;
        
            $(window).on('click',function(){
                isClick = 0;
            });
        
            $(myCalendar).on('apply.daterangepicker',function(ev, picker){
                isClick = 0;
                $(this).val(picker.startDate.format('DD/MM/YYYY'));
        
            });
        
            $('.js-btn-calendar').on('click',function(e){
                e.stopPropagation();
        
                if(isClick === 1) isClick = 0;
                else if(isClick === 0) isClick = 1;
        
                if (isClick === 1) {
                    myCalendar.focus();
                }
            });
        
            $(myCalendar).on('click',function(e){
                e.stopPropagation();
                isClick = 1;
            });
        
            $('.daterangepicker').on('click',function(e){
                e.stopPropagation();
            });
        
        
        } catch(er) {console.log(er);}
        /*[ Select 2 Config ]
            ===========================================================*/
        
        try {
            var selectSimple = $('.js-select-simple');
        
            selectSimple.each(function () {
                var that = $(this);
                var selectBox = that.find('select');
                var selectDropdown = that.find('.select-dropdown');
                selectBox.select2({
                    dropdownParent: selectDropdown
                });
            });
        
        } catch (err) {
            console.log(err);
        }
        

    })(jQuery);
    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->