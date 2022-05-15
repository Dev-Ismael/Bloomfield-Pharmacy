@extends('layouts.admin')

@section('content')
    <div class="py-4 admin-page-info">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item " style="margin-top: -1px">
                    <a href="{{ route('home') }}">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 col-xl-7 col-xxl-8 mb-4">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h2 class="fs-5 fw-bold mb-0"> <i class="fa-solid fa-plus text-primary"></i> Create
                                            User</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <form action="{{ route('admin.users.store') }}" method="POST">

                                        @csrf


                                        <div class="mb-4 input-content">
                                            <label for="name" class="capitalize"> <i class="fa-solid fa-file-signature"></i> Username </label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" aria-describedby="emailHelp" placeholder="Type User Name..." autocomplete="nope" required/>
                                            @error('name')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>


                                        {{-- <div class="mb-4 input-content">
                                            <label for="first_name" class="capitalize"> <i class="fa-solid fa-file-signature"></i> First Name </label>
                                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" aria-describedby="emailHelp" placeholder="Type User Frist Name..." autocomplete="nope"/>
                                            @error('first_name')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>

                                        
                                        <div class="mb-4 input-content">
                                            <label for="last_name" class="capitalize"> <i class="fa-solid fa-file-signature"></i> Last Name </label>
                                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" aria-describedby="emailHelp" placeholder="Type User Last Name..." autocomplete="nope"/>
                                            @error('last_name')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div> --}}


                                        <div class="mb-4 input-content">
                                            <label for="email" class="capitalize"> <i class="fa-solid fa-envelope"></i> Email Address </label>
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Type User Email..." autocomplete="nope" required/>
                                            @error('email')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>


                                        {{-- <div class="mb-4 input-content">
                                            <label for="email_2" class="capitalize"> <i class="fa-solid fa-envelope"></i> Second Email Address </label>
                                            <input type="text" name="email_2" id="email_2" class="form-control @error('email_2') is-invalid @enderror" value="{{ old('email_2') }}" aria-describedby="emailHelp" placeholder="Type User Second Email..." autocomplete="nope"/>
                                            @error('email_2')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div> --}}

                                        
                                        <div class="mb-4 input-content">
                                            <label for="password" class="capitalize"> <i class="fa-solid fa-lock"></i> Password </label>
                                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Type User Password..." autocomplete="nope" required/>
                                            @error('password')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>

                                        
                                        <div class="mb-4 input-content">
                                            <label for="password_confirmation" class="capitalize"> <i class="fa-solid fa-lock"></i> Password Confirmed </label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Type User Password Again..." autocomplete="nope" required/>
                                            @error('password_confirmation')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>
                                        

                                        {{-- <div class="mb-4 input-content">
                                            <label for="phone" class="capitalize"> <i class="fa-solid fa-phone-volume"></i> Phone </label>
                                            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" aria-describedby="emailHelp" placeholder="Type User Phone..." autocomplete="nope"/>
                                            @error('phone')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>

                                        
                                        <div class="mb-4 input-content">
                                            <label for="phone_2" class="capitalize"> <i class="fa-solid fa-phone-volume"></i> Second Phone </label>
                                            <input type="text" name="phone_2" id="phone_2" class="form-control @error('phone_2') is-invalid @enderror" value="{{ old('phone_2') }}" aria-describedby="emailHelp" placeholder="Type User Second Phone..." autocomplete="nope"/>
                                            @error('phone_2')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>

                                        
                                        <div class="mb-4 input-content">
                                            <label for="state" class="capitalize"> <i class="fa-solid fa-flag-usa"></i> State </label>
                                            <input type="text" name="state" id="state" class="form-control @error('state') is-invalid @enderror" value="{{ old('state') }}" aria-describedby="emailHelp" placeholder="Type User State..." autocomplete="nope"/>
                                            @error('state')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>

                                        
                                        <div class="mb-4 input-content">
                                            <label for="address" class="capitalize"> <i class="fa-solid fa-location-dot"></i> Address </label>
                                            <textarea type="text" name="address" id="address" rows="5" class="form-control @error('address') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Type User Address..." autocomplete="nope"/> {{ old('address') }} </textarea>
                                            @error('address')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>

                                        
                                        <div class="mb-4 input-content">
                                            <label for="address_2" class="capitalize"> <i class="fa-solid fa-location-dot"></i> Second Address </label>
                                            <textarea type="text" name="address_2" id="address_2" rows="5" class="form-control @error('address_2') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Type User Second Address..." autocomplete="nope"/> {{ old('address_2') }} </textarea>
                                            @error('address_2')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>

                                        
                                        <div class="mb-4 input-content">
                                            <label for="address_3" class="capitalize"> <i class="fa-solid fa-location-dot"></i> Third Address </label>
                                            <textarea type="text" name="address_3" id="address_3" rows="5" class="form-control @error('address_3') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Type User Third Address..." autocomplete="nope"/> {{ old('address_3') }} </textarea>
                                            @error('address_3')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div> --}}

                                        

                                        <div class="mb-4 input-content">
                                            <label for="role" class="capitalize"> <i class="fa-solid fa-shield-halved"></i> User Role </label>
                                            <select class="form-select form-control @error('role') is-invalid @enderror" name="role" id="role"  aria-label="Default select example" required>
                                                <option value="" selected="selected" class="d-none">Choose User Role...</option>
                                                <option value="1"  {{ old('role') == '1' ? "selected" : "" }}>Admin</option>
                                                {{-- <option value="2"  {{ old('role') == '2' ? "selected" : "" }}>Editor</option> --}}
                                                <option value="3"  {{ old('role') == '3' ? "selected" : "" }}>User</option>
                                            </select>
                                            @error('role')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary float-right" > <i class="fa-solid fa-floppy-disk"></i> Submit </button>
                            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
