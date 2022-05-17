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
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
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
                                            Product</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

                                        @csrf


                                        <div class="mb-4 input-content">
                                            <label for="title" class="capitalize"> <i
                                                    class="fa-solid fa-file-signature"></i> Title </label>
                                            <input type="text" name="title" id="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title') }}" aria-describedby="emailHelp"
                                                placeholder="Type Product Title..." autocomplete="nope"  required/>
                                            @error('title')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-4 input-content">
                                            <label for="subcategory_id" class="capitalize"> <i class="fa-solid fa-list"></i> Category </label>
                                            <select class="form-select form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" id="subcategory_id"  aria-label="Default select example" required>
                                                <option value="" selected="selected" class="d-none">Choose Category...</option>
                                                @foreach ( $subcategories as $subcategory )
                                                    <option value="{{ $subcategory->id }}"  {{ old('subcategory_id') == $subcategory->id ? "selected" : "" }} >{{ $subcategory->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('subcategory_id')
                                                <small class="form-text text-danger">{{$message }}</small> 
                                            @enderror
                                        </div>


                                        <div class="mb-4 input-content">
                                            <label for="price" class="capitalize"> <i class="fa-solid fa-money-bill-1"></i> Price </label>
                                            <input type="number" name="price" id="price"
                                                class="form-control @error('price') is-invalid @enderror"
                                                value="{{ old('price') }}" aria-describedby="emailHelp"
                                                placeholder="Type Product Title..." autocomplete="nope"  required/>
                                            @error('price')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        

                                        <div class="mb-4 input-content">
                                            <label for="quantity" class="capitalize"> <i class="fa-solid fa-cart-flatbed"></i> Quantity </label>
                                            <input type="number" name="quantity" id="quantity"
                                                class="form-control @error('quantity') is-invalid @enderror"
                                                value="{{ old('quantity') }}" aria-describedby="emailHelp"
                                                placeholder="Type Product Title..." autocomplete="nope"  required/>
                                            @error('quantity')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        

                                        <div class="mb-4 input-content">
                                            <label for="description" class="capitalize"> <i class="fa-solid fa-align-left"></i> Descrioption </label>
                                            <textarea type="text" name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Type Product descreption..." autocomplete="nope"/>{{ old('description') }}</textarea>
                                            @error('description')
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
