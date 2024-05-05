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
        $message =session()->get('msg');
        if($message){
            echo "<div class='notice'><p class='info bg-black text-white ps-3 '>{$message}</p></div>";
        }
        
    ?>
    <div class="form_movie">
        <form action="/add-voucher" class="car" method="POST" enctype="multipart/form-data" id="add_form">
            @csrf
            {{-- @method('PUT') --}}
            

            <div class="closes" onclick="close_form('add_form')">
                <i class='bx bx-x'></i>
            </div>
            <h2>Create Voucher</h2>
            <label for="name_voucher">Name Voucher</label>
            <input type="text" placeholder="Enter name voucher" id="name_voucher_0" name="name_voucher" required>
            <label for="code">Code Voucher</label>
            <input type="text" placeholder="Enter code" id="code_0" name="code" required>
            <label for="discount">Discount Percentage</label>
            <input type="text" placeholder="Enter discount" id="discount_0" name="discount" required>
            @if($errors->has('discount'))
                <span class="error2">{{$errors->first('discount')}}</span>
                <?php
                    $check=true;
                ?>
            @endif
            <label for="status">Status</label>
            <input type="text" placeholder="Enter status" id="status_0" name="status" required>
            <button type="submit" name="submit" class=" mt-4 text-white border-0 bg-primary ">Submit</button>
        </form>

        <form action="" class="car update_form" method="POST" enctype="multipart/form-data" id="update_form">
            @csrf
            @method('PUT')
            

            <div class="closes" onclick="close_form('update_form')">
                <i class='bx bx-x'></i>
            </div>
            <h2>Update Voucher</h2>
            <label for="name_voucher">Name Voucher</label>
            <input type="text"  id="name_voucher" name="name_voucher" required>
            <label for="code">Code Voucher</label>
            <input type="text"  id="code" name="code" required>
            <label for="discount">Discount Percentage</label>
            <input type="number"  id="discount" name="discount" required>
            <label for="status">Status</label>
            <input type="text"  id="status" name="status" required>
            <button type="submit" name="submit" class=" mt-4 text-white border-0 bg-warning ">Submit</button>
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
        {{-- <form id="form_dlt" class="form_delete" action="" method="post" enctype="multipart/form-data">
            @csrf
            @method("delete")
            <h4 class=" fw-bold text-bg-black">Bạn có chắc muốn xóa Voucher này không</h4>
            <p>Không thể khôi phục lại sau khi xóa </p>
            <div class="row gap-lg-4 gap-sm-1  ">
                <button type="submit" class=" bg-danger text-bg-light rounded col-5 btn-outline-danger  ">Delete</button>
                <button type="reset" id="cancel" class=" bg-success text-bg-light rounded col-5 btn-outline-success">Cancel</button>
            </div>
           

        </form> --}}
    </div>
    <div id="content-wrapper" class="d-flex flex-column position-relative ">
        <div id="content">
             <!-- Topbar -->
             <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow justify-content-between ">

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

            </nav>
            <!-- End of Topbar -->

            <div class="container">
                <div class="d-flex justify-content-between align-items-center ">
                    <h3>Voucher</h3>
                    <a href="#" id="add_voucher" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i>Voucher Movie</a>
                </div>
                
                <p>A voucher is a certificate or document that either allows you to purchase something or proves that you paid for something,
                    please visit <a href="#" target="_black">our website</a>

                </p>

                <div class="card shadow mb-4">
                    <div class="card-header ">
                        <h6 class=" text-primary font-weight-bold ">Voucher Movie</h6>
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
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Discount Percentage</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Remove</th>
                                    </tr>
                                    
                                    @foreach($res as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->code}}</td>
                                            <td>{{$value->discount_percentage}}</td>
                                            <td>{{$value->status}}</td>
                                            <td>
                                                <button value="{{$value->id}}" onclick="update_voucher(this)" class="text-center bg-warning rounded update">Update</button>
                                            </td>
                                            <td>
                                                <button value="{{$value->id}}" onclick="delete_(this,'delete-voucher')" class="text-center bg-danger rounded delete">Delete</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){
            var input =$(this).val()
            $.ajax({
                // url:"live_search/live_search_voucher.php",
                url:'/live-search-voucher',
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
                                    <th>Code</th>
                                    <th>Discount Percentage</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Remove</th>
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
                                    <td>${element.code}</td>
                                    <td>${element.discount_percentage}</td>
                                    <td>${element.status}</td>
                                    <td>
                                        <button value="${element.id}" onclick="update_voucher(this)" class="text-center bg-warning rounded update ">Update</button>
                                    </td>
                                    <td>
                                        <button value="${element.id}" onclick="delete_(this,'delete-voucher')" class="text-center bg-danger rounded delete  ">Delete</button>
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

    var jsvar = <?php echo json_encode($check); ?>;
    if(jsvar){
        // form.style.display='flex';
        document.querySelector('.car').style.display='flex';
        
    }

</script>      
@endsection
