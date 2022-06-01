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
                <li class="breadcrumb-item"><a href="{{ route('admin.prescriptions.index') }}">Prescription</a></li>
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
                                            Prescription</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <form action="{{ route('admin.prescriptions.store') }}" class="create-form" method="POST" enctype="multipart/form-data">

                                        @csrf



                                        <div class="mb-4 input-content">
                                            <label for="user_id" class="capitalize"> <i class="fa-solid fa-user"></i> User </label>
                                            <select class="form-select form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id"  aria-label="Default select example" required>
                                                <option value="" selected="selected" class="d-none">Choose User...</option>
                                                @foreach ( $users as $user )
                                                    <option value="{{ $user->id }}"  {{ old('user_id') == $user->id ? "selected" : "" }}>{{ $user->email }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>


                                        <div class="mb-4 input-content">
                                            <label for="age" class="capitalize"> <i class="fa-solid fa-address-card"></i> Age </label>
                                            <input type="number" name="age" id="age"
                                                class="form-control @error('age') is-invalid @enderror"
                                                value="{{ old('age') }}" aria-describedby="emailHelp"
                                                placeholder="Type Prescription Title..." autocomplete="nope" required/>
                                            @error('age')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-4 input-content">
                                            <label for="gender" class="capitalize"> <i class="fa-solid fa-venus-mars"></i> Gender </label>
                                                <select class="form-select form-control @error('gender') is-invalid @enderror" name="gender" id="gender"  aria-label="Default select example" required>
                                                    <option value="" selected="selected" class="d-none">Choose Patient Gender...</option>
                                                    <option value="male"   {{ old('gender') == 'male' ? "selected" : "" }}>Male</option>
                                                    <option value="female" {{ old('gender') == 'female' ? "selected" : "" }}>Female</option>
                                                    <option value="other"  {{ old('gender') == 'other' ? "selected" : "" }}>Other</option>
                                                </select>
                                            @error('gender')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!------------ Prescription Medicine ----------------->
                                        <div class="mb-4 input-content dynamic-inputs">
                                            <label for="medicine" class="capitalize"> 
                                                <i class="fa-solid fa-capsules"></i> Medicines 
                                                <button type="button" class="btn btn-primary add-field">
                                                    <i class="fa-solid fa-plus" style="color: #fff"></i>
                                                </button>
                                            </label>

                                            <div id="inputFormRow">
                                                <div class="input-group">
                                                    <!---------- Input ----------->
                                                    <input type="text" name="medicine[]" id="medicine"
                                                        class="form-control"
                                                        aria-describedby="emailHelp"
                                                        placeholder="Type Prescription Title..." autocomplete="nope" required/>
                                                    <!---------- Buttons ----------->
                                                    <div class="input-group-append position-relative">
                                                        <button type="button" class="btn btn-primary add-field">
                                                            <i class="fa-solid fa-plus" style="color: #fff"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-primary remove-field">
                                                            <i class="fa-solid fa-trash" style="color: #fff"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="newRowsContainer"></div>
                                            @error('medicine') <!--------- if isset array Validation ------------>
                                                <small class="form-text text-danger">{{$message }}</small>
                                            @enderror
                                            @error('medicine.*') <!--------- if isset items array Validation ------------>
                                                <small class="form-text text-danger">medicine field is not valid</small>
                                            @enderror
                                        </div>

                                        
                                        <div class="mb-4 input-content">
                                            <label for="validation" class="capitalize"> <i class="fa-solid fa-list-check"></i> Validation </label>
                                            <select class="form-select form-control @error('validation') is-invalid @enderror" name="validation" id="validation"  aria-label="Default select example" required>
                                                <option value="" selected="selected" class="d-none">Choose Prescription validation ...</option>
                                                <option value="1" {{ old('validation') == '1' ? "selected" : "" }}> Pending </option>
                                                <option value="2" {{ old('validation') == '2' ? "selected" : "" }}> Valid </option>
                                                <option value="3" {{ old('validation') == '3' ? "selected" : "" }}> Not Valid </option>
                                            </select>
                                            @error('validation')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>
                                        

                                        <div class="mb-4 input-content">
                                            <label for="schedule_orders" class="capitalize"> <i class="fa-solid fa-calendar-check"></i> Schedule Orders Automatically </label>
                                            <select class="form-select form-control @error('schedule_orders') is-invalid @enderror" name="schedule_orders" id="schedule_orders"  aria-label="Default select example" required>
                                                <option value="" selected="selected" class="d-none">Choose Schedule Status...</option>
                                                <option value="0" {{ old('schedule_orders') == '0' ? "selected" : "" }}> OFF </option>
                                                <option value="1" {{ old('schedule_orders') == '1' ? "selected" : "" }}> ON </option>
                                            </select>
                                            @error('schedule_orders')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>



                                        <div class="mb-4 input-content">
                                            <label for="scheduled_days" class="capitalize"> <i class="fa-solid fa-calendar-days"></i> Days Scheduling </label>
                                            <input type="text" name="scheduled_days" id="scheduled_days"
                                                class="form-control @error('scheduled_days') is-invalid @enderror"
                                                value="{{ old('scheduled_days') }}" aria-describedby="emailHelp"
                                                placeholder="Type Days Scheduling the Prescription ..." autocomplete="nope"  required/>
                                            @error('scheduled_days')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>


                                        <div class="mb-4 input-content">
                                            <label for="additional_details" class="capitalize"> <i class="fa-solid fa-align-left"></i> Additional Details </label>
                                            <textarea type="text" name="additional_details" id="additional_details" rows="5" class="form-control @error('additional_details') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Type Prescription descreption..." autocomplete="nope"/>{{ old('additional_details') }}</textarea>
                                            @error('additional_details')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>


                                        <div class="mb-3 input-content">
                                            <label for="img" class="form-label"> <i class="fa-solid fa-image"></i> Image </label> 
                                            <input name="img" type="file" class="form-control @error('img') is-invalid @enderror" id="img" required />
                                            @error('img')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        

                                        <button type="submit" class="btn btn-primary float-right"> <i class="fa-solid fa-floppy-disk"></i> Submit </button>

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
