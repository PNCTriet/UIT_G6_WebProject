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
    <div class=" d-flex flex-column w-100 ">
        <!-- main content-->
        <div class="content">
            <!-- Topbar -->
            @include('layout.admin_topbar')
            <!-- End of Topbar -->
             <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Add Manga</h1>
                {{-- <p class="mb-4">DataTables are taken from the movie database that is used to generate the analysis table.
                    For more information about Movies, please visit <a target="_blank"
                        href="#">our movie website</a>.</p> --}}

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Manga</h6>
                        <!-- <button type="submit" name="submit_movie" class="p-1 bg-gradient-primary text-white rounded-sm">SubMit</button> -->
                    </div>
                    <form class="row position-relative " action="/add-manga" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-xl-8 col-lg-7">
                            <div class="shadow mb-4 card px-lg-5 px-2 py-5">
                                <label>Name manga</label>
                                <input type="text" placeholder="Enter name..." name="title" class="mb-4" required>
                                <label>Description</label>
                                <textarea name="description" placeholder="Enter description..." class="mb-4" required></textarea>
                                <label for="genre">Genres</label>
                                <select name="genre" id="genre" class="mb-4">
                                   
                                       
                                    @foreach ($category as $value)
                                        <option value="{{$value->id}}">{{$value->genre_name}}</option>
                                    @endforeach
                                    
                                   
                                </select>
                                <label for="author">Author</label>
                                <select name="author" id="author">
                                    @foreach($author as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4 px-lg-5 px-2 py-5 link">
                                <label for="poster_link">Poster Manga</label>
                                <input type="file" name="poster_link" id="poster_link" required>
                                @if($errors->has('poster_link'))
                                    <span class="error2">{{$errors->first('poster_link')}}</span>
                                @endif
                                <label for="episode_status">Episode Status </label>
                                
                                <select name="episode_status" id="episode_status" required>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Hiatus">Hiatus</option>
                                </select>
                                @if($errors->has('episode_status'))
                                    <span class="error3">{{$errors->first('episode_status')}}</span>
                                @endif
                            </div>
                            
                        </div>
                        <hr/>
                        <div class="w-100 position-relative pr-3 pl-1">
                           
                            
                            <div class="card shadow mb-4 px-lg-5 px-2 py-5 link ml-2">
                                <div class="container">
                                    <h5 class="mb-3">Thông tin  Chapter</h5>
                                    <div class="d-flex align-items-center">
                                      <span class="red-dot me-2">●</span>
                                      <span>Phân loại Chapter</span>
                                    </div>
                                    <div class="chapter-form">
                                        {{-- <div class="container-box"> --}}
                                            {{-- <span class="close-icon">&times;</span>
                                            <div class="mb-3">
                                                <label class="form-label">Phân chương</label>
                                                <div class="input-group">
                                                    <input type="number" value="1" class="form-control">
                                                    <span class="input-group-text">0/14</span>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Upload ảnh</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control upload-img" name="chapter[]" multiple>
                                                    {{-- <span class="input-group-text">0/20</span> --}}
                                                    {{-- <div class="icon-buttons">
                                                        <i class="bi bi-arrows-move"></i>
                                                        <i class="bi bi-trash"></i>
                                                    </div>
                                                </div>
                                            </div> --}}
                                          
                                           
                                            
                                            
                                        {{-- </div> --}}
                                    </div>
                                       
                                    <div class="mt-3 dashed-box">
                                      <a href="#" class="btn-custom">
                                        <span>+</span> Thêm nhóm Chapter
                                      </a>
                                    </div>
                                </div>
                                
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