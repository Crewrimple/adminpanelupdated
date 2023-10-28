@extends('layout.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="\dashboard">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div>

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ asset('assets/img/images.png') }}" alt="Profile" class="rounded-circle">
                            <h2>{{ $user->name }}</h2>
                             <h3>{{ $user->email }}</h3>

                            
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"
                                        aria-selected="true" role="tab">Overview</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"
                                        aria-selected="false" tabindex="-1" role="tab">Edit Profile</button>
                                </li>

                                

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview"
                                    role="tabpanel">
                                    

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                    </div>

                                  <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">
                                    <div class="container">
                                        <h1>Edit Profile</h1>
                                        @if(session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif
                                        <form method="post" action="{{ route('profile.update') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Full Name</label>
                                                <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input name="email" type="text" class="form-control" id="email" value="{{ $user->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="current_password">Current Password</label>
                                                <input name="current_password" type="password" class="form-control" id="current_password">
                                            </div>
                                            <div class="form-group">
                                                <label for="new_password">New Password</label>
                                                <input name="new_password" type="password" class="form-control" id="new_password">
                                            </div>
                                            <div class="form-group">
                                                <label for="new_password_confirmation">Confirm New Password</label>
                                                <input name="new_password_confirmation" type="password" class="form-control" id="new_password_confirmation">
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                                
                                
                               </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
