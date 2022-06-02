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
                <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Order</a></li>
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
                                            Order</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <form action="{{ route('admin.orders.store') }}" class="create-form" method="POST" enctype="multipart/form-data">

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
                                            <label for="address" class="capitalize"> <i class="fa-solid fa-location-dot"></i> Shipping Address </label>
                                            <input type="text" name="address" id="address"
                                                class="form-control @error('address') is-invalid @enderror"
                                                value="{{ old('address') }}" aria-describedby="emailHelp"
                                                placeholder="Type Address Shipping..." autocomplete="nope" required/>
                                            @error('address')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>


                                        <div class="mb-4 input-content">
                                            <label for="phone" class="capitalize"> <i class="fa-solid fa-phone-volume"></i> Phone </label>
                                            <input type="text" name="phone" id="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                value="{{ old('phone') }}" aria-describedby="emailHelp"
                                                placeholder="Type Phone Shipping..." autocomplete="nope" required/>
                                            @error('phone')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>


                                        <!------------ Peoduct ----------------->
                                        <div class="mb-4 input-content dynamic-inputs">
                                            <label for="product" class="capitalize"> 
                                                <i class="fas fa-box-open"></i> Products 
                                                <button type="button" class="btn btn-primary add-product-field">
                                                    <i class="fa-solid fa-plus" style="color: #fff"></i>
                                                </button>
                                            </label>

                                            <div id="inputFormRow">
                                                <div class="input-group">
                                                    <!---------- Input ----------->
                                                    <div class="container" style="padding: 0">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <select name="product_id[]" id="product_id" class="form-control @error('product_id') is-invalid @enderror @error('product_id.*') is-invalid @enderror " required>
                                                                    @foreach ( $products as $product )
                                                                        <option value="" disabled selected hidden> Choose Product... </option>
                                                                        <option value="{{$product->id}}" >{{$product->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-3">
                                                                <input type="number" class="form-control  @error('quantity') is-invalid @enderror @error('quantity.*') is-invalid @enderror  " name="quantity[]" id="quantity" placeholder="Quantity" required/>
                                                            </div>
                                                            <div class="col-3">
                                                                <!---------- Buttons ----------->
                                                                <div class="input-group-append position-relative">
                                                                    <button type="button" class="btn btn-primary add-product-field">
                                                                        <i class="fa-solid fa-plus" style="color: #fff"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-primary remove-product-field">
                                                                        <i class="fa-solid fa-trash" style="color: #fff"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="newRowsContainer"></div>
                                            @error('product_id') <!--------- if isset array Validation ------------>
                                                <small class="form-text text-danger">{{$message }}</small>
                                            @enderror
                                            @error('product_id.*') <!--------- if isset items array Validation ------------>
                                                <small class="form-text text-danger">product field is not valid</small>
                                            @enderror
                                            @error('quantity') <!--------- if isset array Validation ------------>
                                                <small class="form-text text-danger">{{$message }}</small>
                                            @enderror
                                            @error('quantity.*') <!--------- if isset items array Validation ------------>
                                                <small class="form-text text-danger">quantity field is not valid</small>
                                            @enderror
                                        </div>



                                        <div class="mb-4 input-content">
                                            <label for="status" class="capitalize"> <i class="fa-solid fa-list-check"></i> Status </label>
                                            <select class="form-select form-control @error('status') is-invalid @enderror" name="status" id="status"  aria-label="Default select example" required>
                                                <option value="" selected="selected" class="d-none">Choose Order status ...</option>
                                                <option value="1" {{ old('status') == '1' ? "selected" : "" }}> Processed </option>
                                                <option value="2" {{ old('status') == '2' ? "selected" : "" }}> Shipped </option>
                                                <option value="3" {{ old('status') == '3' ? "selected" : "" }}> En Route </option>
                                                <option value="4" {{ old('status') == '4' ? "selected" : "" }}> Arrived </option>
                                            </select>
                                            @error('status')
                                                <small class="form-text text-danger">{{$message }}</small> 
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
