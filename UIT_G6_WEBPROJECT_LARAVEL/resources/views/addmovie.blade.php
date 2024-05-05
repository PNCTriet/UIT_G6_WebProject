@extends('layout.template')

@section('header')
    @include('layout.header')
@endsection



@section('navbar')
    @include('layout.navbar')
@endsection

@section('content')
    <?php
        $message =session()->get('msg');
        if($message){
            echo "<div class='notice'><p class='info ps-3 bg-black text-white'>{$message}</p></div>";
        }

        // if($errors->all()){
        //     foreach($errors->all() as $msg){
        //         echo "<p>{$msg}</p>";
        //     }
        // }
    ?>
    <!-- wrap content-->
    <div class=" d-flex flex-column ">
        <!-- main content-->
        <div class="content">
             <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>

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
                            <img class="img-profile rounded-circle"
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
             <!-- Begin Page Content -->
             <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Add Movie</h1>
                <p class="mb-4">DataTables are taken from the movie database that is used to generate the analysis table.
                    For more information about Movies, please visit <a target="_blank"
                        href="#">our movie website</a>.</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Movie</h6>
                        <!-- <button type="submit" name="submit_movie" class="p-1 bg-gradient-primary text-white rounded-sm">SubMit</button> -->
                    </div>
                    <form class="row position-relative " action="/add-movie" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-xl-8 col-lg-7">
                            <div class="shadow mb-4 card px-lg-5 px-2 py-5">
                                <label>Name movie</label>
                                <input type="text" placeholder="name movie" name="title" class="mb-4" required>
                                <label>Description</label>
                                <textarea name="description" placeholder="write about movie" class="mb-4" required></textarea>
                                <select name="category" id="category" class="mb-4">
                                   
                                       
                                    @foreach ($category as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                    
                                   
                                </select>
                                <select name="specialgroup" id="specialgroup">
                                    @foreach($specialgroup as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4 px-lg-5 px-2 py-5 link">
                                <label for="movie_link">Movie Link</label>
                                <input type="text" name="movie_link" id="movie_link" required>
                                @if($errors->has('movie_link'))
                                    <span class="error1">{{$errors->first('movie_link')}}</span>
                                @endif
                                <label for="poster_link">Poster Movie</label>
                                <input type="file" name="poster_link" id="poster_link" required>
                                @if($errors->has('poster_link'))
                                    <span class="error2">{{$errors->first('poster_link')}}</span>
                                @endif
                                <label for="trailer_link">Trailer Link</label>
                                <input type="text" name="trailer_link" id="trailer_link" required>
                                @if($errors->has('trailer_link'))
                                    <span class="error3">{{$errors->first('trailer_link')}}</span>
                                @endif
                            </div>
                            
                        </div>
                        <button type="submit" name="submit_movie" class="sub_movie rounded-sm">SubMit</button>
                        
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('footer')
    @include('layout.script')
    @include('layout.footer')
@endsection