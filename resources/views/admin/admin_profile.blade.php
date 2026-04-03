@extends('admin.admin_master')
@section('admin')
<style>
    .admin-profile-avatar {
        width: 120px;
        height: 120px;
        object-fit: cover;
    }

    @media (min-width: 992px) {
        .admin-profile-avatar {
            width: 140px;
            height: 140px;
        }
    }
</style>
     <div class="content">

                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Profile</h4>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">

	                                        <div class="align-items-center">
	                                            <div class="d-flex align-items-center">
	                                                <img src="{{(!empty($profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('https://t4.ftcdn.net/jpg/06/28/36/93/360_F_628369390_99h2NtiLNzHwvQXYlg7JTAX21ID8CSdV.jpg')}}" class="rounded-circle img-thumbnail admin-profile-avatar" alt="image profile">

	                                                <div class="overflow-hidden ms-4">
	                                                    <h4 class="m-0 text-dark fs-20">{{$profileData->name}}</h4>
	                                                    <p class="my-1 text-muted fs-16">{{$profileData->email}}</p>
	                                                    <span class="fs-15"><i class="mdi mdi-message me-2 align-middle"></i>Speaks: <span>Urdu <span class="badge bg-primary-subtle text-primary px-2 py-1 fs-13 fw-normal">native</span> , English, Turkish </span></span>
	                                                </div>
	                                            </div>
	                                        </div>



                                            <div class="tab-pane pt-4" id="profile_setting" role="tabpanel" aria-labelledby="setting_tab">
                                                <div class="row">

                                                    <div class="row">
                                                        <div class="col-lg-6 col-xl-6">
                                                            <div class="card border mb-0">

                                                                <div class="card-header">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            <h4 class="card-title mb-0">Personal Information</h4>
                                                                        </div><!--end col-->
                                                                    </div>
                                                                </div>
	                                                                <form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data" >
	                                                                    @csrf

                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Name</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="text" name="name" value="{{$profileData->name}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Email</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="email" name="email" value="{{$profileData->email}}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Phone</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="text" name="phone" value="{{$profileData->phone}}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Address</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="text" name="address" value="{{$profileData->address}}">
                                                                            </div>
	                                                                        </div>

	                                                                        <div class="form-group mb-3 row">
	                                                                            <label class="form-label">Photo</label>
	                                                                            <div class="col-lg-12 col-xl-12">
	                                                                                <input class="form-control" type="file" id="image" name="photo">
	                                                                            </div>
	                                                                        </div>

	                                                                        <div class="form-group mb-3 row">
	                                                                            <label class="form-label"></label>
	                                                                            <div class="col-lg-12 col-xl-12">
	                                                                               <img src="{{(!empty($profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('https://t4.ftcdn.net/jpg/06/28/36/93/360_F_628369390_99h2NtiLNzHwvQXYlg7JTAX21ID8CSdV.jpg')}}" id="showImage" class="rounded-circle img-thumbnail admin-profile-avatar d-block" alt="image profile">
	                                                                            </div>
	                                                                        </div>

                                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                                    </div><!--end card-body-->
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-xl-6">

                                                           <form action="{{route("admin.password.update")}}" method="post">
                                                            @csrf
                                                             <div class="card border mb-0">

                                                                <div class="card-header">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            <h4 class="card-title mb-0">Change Password</h4>
                                                                        </div><!--end col-->
                                                                    </div>
                                                                </div>

                                                                <div class="card-body mb-0">
                                                                    <div class="form-group mb-3 row">
                                                                        <label class="form-label">Old Password</label>
                                                                        <div class="col-lg-12 col-xl-12">
                                                                            <input class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="old_password" type="password" placeholder="Old Password">
                                                                            @error('old_password')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                   <div class="form-group mb-3 row">
                                                                        <label class="form-label">new Password</label>
                                                                        <div class="col-lg-12 col-xl-12">
                                                                            <input class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password" type="password" placeholder="New Password">
                                                                            @error('new_password')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                   <div class="form-group mb-3 row">
                                                                        <label class="form-label">new Password</label>
                                                                        <div class="col-lg-12 col-xl-12">
                                                                            <input class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" id="new_password_confirmation" type="password" placeholder="new password confirmation">
                                                                            @error('new_password_confirmation')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12 col-xl-12">
                                                                            <button type="submit" class="btn btn-primary">Change Password</button>

                                                                        </div>
                                                                    </div>

                                                                </div><!--end card-body-->
                                                            </div>
                                                           </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> <!-- end education -->
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader()
                    reader.onload = function(e){
                        $('#showImage').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(e.target.files['0'])
                })
            })
        </script>

@endsection
