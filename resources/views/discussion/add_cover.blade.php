@extends('layouts.app')

@section('content')


@auth
    <x-menu />
@endauth


<div class="container-fluid col-xxl-8 px-0 py-2">
    <div class="bg-light p-3 rounded ">
        <!-- HEADER SLIDE START HERE -->
        <div class="bg-light px-4  mb-2 text-center">
            <div class="py-1">
                <h1 class="display-6 fw-bold text-dark">Discussion</h1>
            </div>
        </div>

        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div class="col">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    <!-- <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">{{ $discussions-> count() }}</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div> -->
                </div>
            </div>
            <div class="">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    @auth
                        <form action="{{ route('users.creatediscussion',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-info">Add discussion</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>




<div class="row justify-content-center align-items-center">
    <!-- END LIST OF DISCUSSION -->
    <!-- Participated POSTED MESSAGE  -->
    <div class="col-md-9">
        <div class="container-fluid bg-light py-5 ">
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
                                    novalidate action="{{ route('users.discussion.add_cover',  $discussions ) }}" method="post">
                                    @csrf
                                    
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
    <!-- END LIST NOTIFICATION START HERE -->
</div>

@endsection