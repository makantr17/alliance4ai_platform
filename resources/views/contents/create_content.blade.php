@extends('layouts.app')

@section('content')


@auth
    <x-menu />
@endauth


<div class="container-fluid col-xxl-8 px-0 py-2">
    <div class="bg-light p-3 rounded ">
        <!-- HEADER SLIDE START HERE -->s
        <div class="bg-dark text-secondary px-4  mb-2 text-center">
            <div class="py-1">
                <h1 class="display-6 fw-bold text-white">Discussion</h1>
            </div>
            <div class="overflow-hidden" style="max-height: 15vh;">
                <div class="container px-3">
                    <img src="/icons/abstract_background.jpg" class="img-fluid rounded-3 shadow-lg mb-4" alt="Example image" width="90%" height="500" loading="lazy">
                </div>
            </div>
        </div>

        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div class="col">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">15</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div>
                </div>
            </div>
            <div class="">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    @auth
                        <form action="{{ route('users.creatediscussion',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-light">Add discussion</button>
                        </form>

                        <form action="{{ route('users.createtopics',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">New topic</button>
                        </form>

                        <form action="" method="post" class="mr-1">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">Collaborators</button>
                        </form>
                    @endauth
                    </span>
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>




<div class="row">
    <!-- END LIST OF DISCUSSION -->
    <!-- Participated POSTED MESSAGE  -->
    <div class="col-md-8">

        <div class="container-fluid bg-light  py-5 ">
            <div class="row justify-content-center align-items-center">
                <div class="profile-edit col-sm-8">
                    <div class=" justify-content-centent">
                        <h6 class="display-4 lh-lg fw-light">Add new topic</h6>
                        <img src="/icons/abstract_background.jpg" class="rounded-circle shadow-lg mb-4" alt="Example image" width="150" height="150" loading="lazy">
                    </div>
                    <div class="flex justify-center">
                        @auth
                            <div class="container">
                                <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-content-center" enctype="multipart/form-data"
                                    novalidate action="{{ route('users.addcontent',  $topic ) }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title" placeholder="Your title" 
                                        class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="">
                                        
                                        @error('title')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" name="description" id="description" placeholder="Your description" 
                                        class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" value="">
                                        
                                        @error('description')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="link" class="form-label">Link</label>
                                        <input type="text" name="link" id="link" placeholder="Your link" 
                                        class="form-control py-2  rounded-lg @error('link') border border-danger @enderror" value="">
                                        
                                        @error('link')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-sm-12 mb-3">
                                        <label for="file" class="form-label">Edit your image</label>
                                        <input class="form-control" name="image" type="file" id="image" value="">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                    
                                </form>
                            </div>
                            
                        @endauth
                    </div>
                </div>
                
            </div>
        </div>











    </div>
    <!-- END POSTED MESSAGE -->

    <!-- START LIST NOTIFICATION START HERE -->
    <div class="col-md-3">
        <h6 class="border-bottom pb-2 mb-0">Recent Notifications</h6>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                <h6 class="my-0">Timeline</h6>
                <small class="text-muted">start_at -end_at</small>
                </div>
                <span class="text-muted">1week</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                <h6 class="my-0">Remplir les info</h6>
                <small class="text-muted">Corectement remplir les info</small>
                </div>
                <span class="text-muted">100</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                <h6 class="my-0">Athentification</h6>
                <small class="text-muted">Informations correctes</small>
                </div>
                <span class="text-muted">100</span>
            </li>
        </ul>
    </div>
    <!-- END LIST NOTIFICATION START HERE -->
</div>

@endsection