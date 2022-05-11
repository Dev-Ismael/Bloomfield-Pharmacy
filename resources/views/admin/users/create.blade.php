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
                                        <h2 class="fs-5 fw-bold mb-0"> <i class="fa-solid fa-plus text-tertiary"></i> Create
                                            User</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <form action="{{ route('admin.users.create') }}">

                                        <div class="mb-4"><label for="email" class="capitalize"">Username</label> <input
                                                    type=" email" class="form-control" id="email"
                                                aria-describedby="emailHelp">
                                                <small id="emailHelp" class="form-text text-danger">We'll never share your
                                                    email
                                                    with anyone else.</small>
                                        </div>

                                        <div class="mb-4"><label for="email" class="capitalize"">Frist Name</label> <input
                                                    type=" email" class="form-control" id="email"
                                                aria-describedby="emailHelp">
                                                <small id="emailHelp" class="form-text text-danger">We'll never share your
                                                    email
                                                    with anyone else.</small>
                                        </div>

                                        <div class="mb-4"><label for="email" class="capitalize"">Last Name</label> <input
                                                    type=" email" class="form-control" id="email"
                                                aria-describedby="emailHelp">
                                                <small id="emailHelp" class="form-text text-danger">We'll never share your
                                                    email
                                                    with anyone else.</small>
                                        </div>

                                        <div class="mb-4"><label for="email" class="capitalize"">Email</label> <input
                                                    type=" email" class="form-control" id="email"
                                                aria-describedby="emailHelp">
                                                <small id="emailHelp" class="form-text text-danger">We'll never share your
                                                    email
                                                    with anyone else.</small>
                                        </div>

                                        <div class="mb-4"><label for="email" class="capitalize"">Email 2</label> <input
                                                    type=" email" class="form-control" id="email"
                                                aria-describedby="emailHelp">
                                                <small id="emailHelp" class="form-text text-danger">We'll never share your
                                                    email
                                                    with anyone else.</small>
                                        </div>

                                        <div class="mb-4"><label for="email" class="capitalize"">Password</label> <input
                                                    type=" email" class="form-control" id="email"
                                                aria-describedby="emailHelp">
                                                <small id="emailHelp" class="form-text text-danger">We'll never share your
                                                    email
                                                    with anyone else.</small>
                                        </div>
                                        
                                        <div class="mb-4"><label for="email" class="capitalize"">Phone</label> <input
                                                    type=" email" class="form-control" id="email"
                                                aria-describedby="emailHelp">
                                                <small id="emailHelp" class="form-text text-danger">We'll never share your
                                                    email
                                                    with anyone else.</small>
                                        </div>

                                        <div class="mb-4"><label for="email" class="capitalize"">Phone 2 </label> <input
                                                    type=" email" class="form-control" id="email"
                                                aria-describedby="emailHelp">
                                                <small id="emailHelp" class="form-text text-danger">We'll never share your
                                                    email
                                                    with anyone else.</small>
                                        </div>

                                        <div class="mb-4"><label for="email" class="capitalize"">Address </label> <textarea type="email" class="form-control" id="email" aria-describedby="emailHelp"></textarea>
                                                <small id=" emailHelp" class="form-text text-danger">We'll never share your
                                                email
                                                with anyone else.</small>
                                        </div>

                                        <div class="mb-4"><label for="email" class="capitalize"">Address 2 </label> <textarea type="email" class="form-control" id="email" aria-describedby="emailHelp"></textarea>
                                                <small id=" emailHelp" class="form-text text-danger">We'll never share your
                                                email
                                                with anyone else.</small>
                                        </div>

                                        <div class="mb-4"><label for="email" class="capitalize"">Address 3 </label> <textarea type="email" class="form-control" id="email" aria-describedby="emailHelp"></textarea>
                                                <small id=" emailHelp" class="form-text text-danger">We'll never share your
                                                email
                                                with anyone else.</small>
                                        </div>

                                        <div class="mb-4"><label class="my-1 me-2"
                                                for="country">User Role</label> <select class="form-select" id="country"
                                                aria-label="Default select example">
                                                <option value="0" selected="selected" class="d-none">Choose role</option>
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                                <option value="3">editor</option>
                                            </select>
                                        </div>


                                        <button class="btn btn-primary float-right"> <i class="fa-solid fa-floppy-disk"></i> Submit </button>
                            
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
