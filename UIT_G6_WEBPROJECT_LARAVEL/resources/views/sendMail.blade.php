@extends('layout.template')
@section('header')
    @include('layout.header')
@endsection

@section('navbar')
    @include('layout.navbar')
   
@endsection
@section('footer')
    @include('layout.script')
    @include('layout.footer')
@endsection

@section('content')
    <?php
    $check=false;
    if ($errors->any()){
        foreach ($errors->all() as $error){
            echo "<div>{$error}</div>";
        }
    }
       
    $message =session()->get('msg');
    if($message){
        echo "<div class='notice'><p class='info bg-black text-white ps-3 '>{$message}</p></div>";
    }

    ?>
    <div class="form_movie">
        <form action="" class="car" method="POST" enctype="multipart/form-data" id="add_form">
            @csrf
            @method('PUT')
            

            <div class="closes" onclick="close_form('add_form')">
                <i class='bx bx-x'></i>
            </div>
            <h2>Send Mail</h2>
            <div class="d-flex gap-2 text-center ">
                <label for="name_voucher" class="mt-0">Send mail to:</label>
                <strong class="nameEmail ml-2"></strong>
            </div>
            
            <label for="subject">Subject</label>
            <input type="text" placeholder="Enter Subject" id="subject" name="subject" required>
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" placeholder="Enter content"></textarea>

            <button type="submit" name="submit" class=" mt-4 text-white border-0 bg-primary ">Submit</button>
        </form>

        

        <form id="form_dlt" class="form_delete" action="" method="post" enctype="multipart/form-data">
            @csrf
            @method("delete")
            <h4 class=" fw-bold text-bg-black">Bạn có chắc muốn xóa bộ phim này không</h4>
            <p>Không thể khôi phục lại sau khi xóa </p>
            <div class="row gap-lg-4 gap-sm-1  ">
                <button type="submit" class=" bg-danger text-bg-light rounded col-5 btn-outline-danger  ">Delete</button>
                <button type="reset" id="cancel" class=" bg-success text-bg-light rounded col-5 btn-outline-success">Cancel</button>
            </div>
        

        </form>
        
    </div>
    <div id="content-wrapper" class="d-flex flex-column position-relative ">
        <div id="content">
            <!-- Topbar -->
            {{-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow justify-content-between ">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-sm-block d-md-none  rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

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

                

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                            <img class="img-profile rounded-circle  "
                                src="img/undraw_profile.svg">
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
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav> --}}
            @include('layout.admin_topbar')
            <!-- End of Topbar -->

            <div class="container">
                <div class="d-flex justify-content-between align-items-center ">
                    <h3>Send Mail</h3>
                    
                </div>
                
                <p>When a user logs in or accesses a specific page, the website checks their assigned
                    role and determines what content and features they can
                    see or interact with.<a href="#" target="_black">our website</a>

                </p>

                <div class="card shadow mb-4">
                    <div class="card-header ">
                        <h6 class=" text-primary font-weight-bold ">Send Mail To Users </h6>
                    </div>
                    <div class="card-body table-movie">
                        <div class="w-50 mb-4">
                            <input type="text" class="form-control" placeholder="Search..." id="live_search" autocomplete="off">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100" id="table-data">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Day of Birth</th>
                                        <th>email</th>
                                        <th>Role</th>
                                        <th>Send Mail</th>
                                        
                                    </tr>
                                    
                                    @foreach($res as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->birthday}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->role_type}}</td>
                                            <td>
                                                <button value="{{$value->id}}" email="{{$value->email}}" onclick="send_mail(this)" class="text-center bg-success rounded update">Send</button>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        


        </div>
        {{-- test function --}}
        <h1 class="test"></h1>
    
    <script type="text/javascript">
        $("#test").html("hello anh em nhe anh thuong em nhiêu")
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                var input =$(this).val()
                $.ajax({
                    // url:"live_search/live_search_voucher.php",
                    url:'/live-search-users',
                    data:{query:input}, //this is query parameter like /live-search-voucher?query=input
                    // method:"GET",
                    success:function(response){
                        console.log(response.data.length)
                        var result =response.data
                        var output ="";
                        if(!response.msg){
                            output =`
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Day of Birth</th>
                                        <th>email</th>
                                        <th>Role</th>
                                        <th>Send Email</th>
                                    </tr>
                                </thead>
                                </tbody>`
                            ;

                            
                            
                            result= Array.from(result)
                            result.forEach(element => {
                                output +=`
                                    <tr>
                                        <td>${element.id}</td>
                                        <td>${element.name}</td>
                                        <td>${element.birthday}</td>
                                        <td>${element.email}</td>
                                        <td>${element.role_type}</td>
                                        <td>
                                            <button value="${element.id}" onclick="send_mail(this)" email="${element.email}" class="text-center bg-success rounded update">Send</button>
                                        </td>
                                        


                                    </tr>
                                `
                            });
                            output+=`</tbody>`

                            $("#table-data").html(output)
                        }else{
                            $("#table-data").html(response.msg)
                        }
                    }
                })
            })
        })

        const add_voucher =document.querySelector('#add_voucher');
        add_voucher.addEventListener('click',()=>{
            console.log("ok em")
            document.getElementById('add_form').style.display='flex';
            document.getElementsByClassName('table-movie')[0].style.pointerEvents='none'
        })

       

    </script>      
@endsection