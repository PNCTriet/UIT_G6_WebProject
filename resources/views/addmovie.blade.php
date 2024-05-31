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
            @include('layout.admin_topbar')
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
                                <label for="episode_status">Episode Status </label>
                                <input type="text" name="episode_status" id="episode_status" required>
                                @if($errors->has('episode_status'))
                                    <span class="error3">{{$errors->first('episode_status')}}</span>
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