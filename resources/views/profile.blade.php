@extends('layouts.master')

@section('title', 'Laravel')
@section('content')

<div class="section-body">
    <h2 class="section-title">Hi, {{ Auth::user()->name }}</h2>
    <p class="section-lead">
        Change information about yourself on this page.
    </p>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <!-- src="../assets/img/avatar/avatar-1.png" -->
                    <img alt="image" src="" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Posts</div>
                            <div class="profile-widget-item-value">187</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Followers</div>
                            <div class="profile-widget-item-value">6,8K</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Following</div>
                            <div class="profile-widget-item-value">2,1K</div>
                        </div>
                    </div>
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">{{ Auth::user()->name }}
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> Web Developer
                        </div>
                    </div>
                    {{ Auth::user()->name }} is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                </div>
                <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow {{ Auth::user()->name }} On</div>
                    <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-github mr-1">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}" required="">
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}" required="">
                                <div class="invalid-feedback">
                                    Please fill in the username
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="phone">Phone</label>
                                <input name="phone" type="text" class="form-control" value="{{ Auth::user()->phone }}" required="">
                                <div class="invalid-feedback">
                                    Please fill in the phone
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="address">Address</label>
                                <input name="address" type="text" class="form-control" value="{{ Auth::user()->address }}" required="">
                                <div class="invalid-feedback">
                                    Please fill in the address
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" value="{{ Auth::user()->email }}" required="">
                                <div class="invalid-feedback">
                                    Please fill in the email
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="picture">Picture</label>
                                <input name="image" type="file" class="form-control" value="ujang@maman.com" required="">
                                <div class="invalid-feedback">
                                    Please fill in the image
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('page-scripts')
<script type=" text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js">
</script>
@endpush

@push('after-scripts')
@endpush