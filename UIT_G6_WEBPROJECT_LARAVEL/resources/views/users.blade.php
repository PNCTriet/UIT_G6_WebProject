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
            echo "<div class='info_err'>{$error}</div>";
        }
      
    }
       
    $message =session()->get('msg');
    if($message){
        echo "<div class='notice'><p class='info bg-black text-white ps-3 '>{$message}</p></div>";
    }

    ?>
    <div class="form_movie">
        <form action="/add-user" class="car" method="POST" enctype="multipart/form-data" id="add_form">
            @csrf
            {{-- @method('PUT') --}}
            

            <div class="closes" onclick="close_form('add_form')">
                <i class='bx bx-x'></i>
            </div>
            <h2>Create User</h2>
            <label for="name_voucher">Name User</label>
            <input type="text" placeholder="Enter fullname" id="fullname" name="fullname" required>
            <label for="dayofbirth">Day of Birth</label>
            <input type="date" placeholder="Enter your birth" id="dayofbirth" name="dayofbirth" required>
            <label for="email">Email</label>
            <input type="email" placeholder="Enter email" id="email" name="email" required>
            @if($errors->has('email'))
                <span class="error2">{{$errors->first('email')}}</span>
                <?php
                    $check=true;
                ?>
            @endif
            <label for="phoneNumber">Phone Number</label>
            <input type="number" placeholder="Enter you phone" id="phoneNumber" name="phoneNumber" required>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required placeholder="Enter your address">
            <label for="role_id">Role</label>
            <select id="role_id" name="role_id"  >
                @foreach($role as $value)
                    <option value="{{$value->id}}">{{$value->role_type}}</option>
                @endforeach
            </select>
            <label for="avartar">Avartar</label>
            <input type="file" name="avartar" id="avartar">


            {{-- Default is basic --}}
            {{-- <label for="plan_id">Plan</label>
            <select name="plan_id" id="plan_id">

            </select> --}}
            {{-- default is NULL --}}
            {{-- <label for="deposit_id">Deposit</label>
            <select name="deposit_id" id="deposit_id">

            </select> --}}

            <button type="submit" name="submit" class=" mt-4 text-white border-0 bg-primary ">Submit</button>
        </form>

        <form action="" class="car update_form" method="POST" enctype="multipart/form-data" id="update_form">
            @csrf
            @method('PUT')
            

            <div class="closes" onclick="close_form('update_form')">
                <i class='bx bx-x'></i>
            </div>
            <h2>Update User</h2>
            <label for="fullname_1">Name User</label>
            <input type="text" placeholder="Enter fullname" id="fullname_1" name="fullname" required>
            <label for="dayofbirth_1">Day of Birth</label>
            <input type="date" placeholder="Enter your birth" id="dayofbirth_1" name="dayofbirth" required>
            <label for="email_1">Email</label>
            <input type="email" placeholder="Enter email" id="email_1" name="email" required>
            @if($errors->has('email'))
                <span class="error2">{{$errors->first('email')}}</span>
                <?php
                    $check=true;
                ?>
            @endif
            <label for="phoneNumber_1">Phone Number</label>
            <input type="number" placeholder="Enter you phone" id="phoneNumber_1" name="phoneNumber" required>
            <label for="address_1">Address</label>
            <input type="text" id="address_1" name="address" required placeholder="Enter your address">
            <label for="role_id_1">Role</label>
            <select id="role_id_1" name="role_id"  >
                @foreach($role as $value)
                    <option value="{{$value->id}}">{{$value->role_type}}</option>
                @endforeach
            </select>
            <label for="avartar_1">Avartar</label>
            <input type="file" name="avartar" id="avartar_1">
            <button type="submit" class=" text-bg-light bg-primary border-0 mt-4 ">Submit</button>

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
            @include('layout.admin_topbar')
            <!-- End of Topbar -->

            <div class="container">
                <div class="d-flex justify-content-between align-items-center ">
                    <h3>Users</h3>
                    <a href="#" id="add_voucher" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i>Add User</a>
                </div>
                
                <p>When a user logs in or accesses a specific page, the website checks their assigned
                    role and determines what content and features they can
                    see or interact with.<a href="#" target="_black">our website</a>

                </p>

                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center  ">
                        <h6 class=" text-primary font-weight-bold ">User Movie</h6>
                        <a href="/export-user" class=" btn bg-warning text-dark fs-2 ">Export Excel</a>
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
                                        <th>BirthDay</th>
                                        <th>email</th>
                                        <th>Role</th>
                                        <th>Edit</th>
                                        <th>Remove</th>
                                    </tr>
                                    
                                    @foreach($res as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->birthday}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->role_type}}</td>
                                            <td>
                                                <button value="{{$value->id}}" onclick="update_user(this)" class="text-center bg-warning rounded update">Update</button>
                                            </td>
                                            <td>
                                                <button value="{{$value->id}}" onclick="delete_(this,'delete-user')" class="text-center bg-danger rounded delete">Delete</button>
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
       
        
    
    <script type="text/javascript">
        
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
                                        <th>BirthDay</th>
                                        <th>email</th>
                                        <th>Role</th>
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
                                        <td>${element.birthday}</td>
                                        <td>${element.email}</td>
                                        <td>${element.role_type}</td>
                                        <td>
                                            <button value="${element.id}" onclick="update_user(this)" class="text-center bg-warning rounded update">Update</button>
                                        </td>
                                        <td>
                                            <button value="${element.id}" onclick="delete_(this,'delete-user')" class="text-center bg-danger rounded delete">Delete</button>
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