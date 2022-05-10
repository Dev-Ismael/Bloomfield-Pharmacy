@extends('layouts.admin')

@section('content')
    <div class="py-4 admin-page-info">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
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
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
                <h2 class="h4 text-primary"> <i class="fa-solid fa-users "></i> Users List</h2>
                <p class="mb-0">Your web analytics dashboard template.</p>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0"><a href="#"
                    class="btn btn-sm btn-primary d-inline-flex align-items-center"><svg class="icon icon-xs me-2"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> New User</a>
            </div>
        </div>

        <div class="table-settings mb-4">
            <div class="row justify-content-between align-items-center">
                <div class="col-9 col-lg-8 d-md-flex">
                    <div class="input-group me-2 me-lg-3 fmxw-300"><span class="input-group-text"><svg
                                class="icon icon-xs" x-description="Heroicon name: solid/search"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg> </span><input type="text" class="form-control" placeholder="Search users"></div>
                </div>
                <div class="col-3 col-lg-4 d-flex justify-content-end">
                    <div class="btn-group">
                        <div class="dropdown me-1">
                            <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-1"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                    class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                                    </path>
                                </svg> <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end pb-0">
                                <span class="small ps-3 fw-bold text-dark">Show</span>

                                <a class="dropdown-item d-flex align-items-center fw-bold" href="{{ route('admin.users.perPage' , 10 ) }}"> 10 </a>
                                <a class="dropdown-item d-flex align-items-center fw-bold" href="{{ route('admin.users.perPage' , 30) }}"> 30 </a>
                                <a class="dropdown-item d-flex align-items-center fw-bold" href="{{ route('admin.users.perPage' , 50) }}">  50 </a>
                                <a class="dropdown-item d-flex align-items-center fw-bold" href="{{ route('admin.users.perPage' , 100) }}"> 100 </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        @if ($users->isEmpty())
            <!----------- No Data ------------->
            <div class="card card-body shadow border-0 text-center">
                No Data Found :(
            </div>
        @else
            <!----------- Users Table ------------->
            <div class="card card-body shadow border-0 table-wrapper table-responsive">
                <div class="d-flex mb-3"><select class="form-select fmxw-200" aria-label="Message select example">
                        <option selected="selected">Bulk Action</option>
                        <option value="1">Send Email</option>
                        <option value="2">Change Group</option>
                        <option value="3">Delete User</option>
                    </select> <button class="btn btn-sm px-3 btn-primary ms-3">Apply</button></div>
                <table class="table user-table table-hover align-items-center">
                    <thead>
                        <tr>
                            <th class="border-bottom">
                                <div class="form-check dashboard-check"><input class="form-check-input checkbox-head"
                                        type="checkbox" value="" id="userCheck55"> <label class="form-check-label"
                                        for="userCheck55"></label></div>
                            </th>
                            <th class="border-bottom">Name</th>
                            <th class="border-bottom">Date Created</th>
                            <th class="border-bottom">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox"
                                            value="" id="userCheck1"> <label class="form-check-label"
                                            for="userCheck1"></label></div>
                                </td>
                                <td><a href="#" class="d-flex align-items-center"><i class="fa-solid fa-user p-2 fa-2x"></i>
                                        <div class="d-block"><span class="fw-bold">{{ $user->name }} {{ $user->id }} </span>
                                            <div class="small text-gray">{{ $user->email }}</div>
                                        </div>
                                    </a></td>
                                <td><span class="fw-normal">{{ $user->created_at }}</span></td>
                                <td class="actions">
                                    <a href="#" class="text-tertiary"> <i class="fa-solid fa-eye"></i> </a>
                                    <a href="#" class="text-info"> <i class="fa-solid fa-pen-to-square"></i> </a>
                                    <a href="#" class="text-danger"> <i class="fa-solid fa-trash-can"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div
                    class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {{ $users->withQueryString()->onEachSide(0)->links() }}
                    </div>
                    <div class="fw-normal small mt-4 mt-lg-0">
                        {{-- Showing <b>5</b> out of <b>25</b> entries --}}
                        Showing <b>{{ $users->firstItem() }}</b>  to <b>{{ $users->lastItem() }}</b> 
                        of total <b>{{$users->total()}}</b>  entries
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
