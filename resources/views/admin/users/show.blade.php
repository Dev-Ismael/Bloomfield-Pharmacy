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
                <li class="breadcrumb-item active" aria-current="page">Show</li>
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
                                        <h2 class="fs-5 fw-bold mb-0"> <i class="fa-solid fa-eye text-primary"></i> User Details</h2>
                                    </div>
                                    <div class="col text-end">
                                        <a href="{{ route("admin.users.edit" , $user->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <a href="{{ route('admin.users.destroy', $user->id) }}" class="btn btn-sm btn-danger delete-record">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush show-data">
                                    <tbody>
                                        <tr>
                                            <td class="text-capitalize"> # ID </td>
                                            <td> {{ $user->id != "" ? $user->id : '-'}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-file-signature"></i> Username </td>
                                            <td> {{ $user->name != "" ? $user->name : '-'  }} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-file-signature"></i> First Name </td>
                                            <td> {{ $user->first_name != "" ? $user->first_name : '-'  }} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-file-signature"></i> Last Name </td>
                                            <td> {{ $user->last_name != "" ? $user->last_name : '-'}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-envelope"></i> Email </td>
                                            <td> {{ $user->email != "" ? $user->email : '-'  }} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-envelope"></i> Second Email </td>
                                            <td> {{ $user->email_2 != "" ? $user->email_2 : '-'  }} </td>
                                        </tr>

                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-phone-volume"></i> Phone </td>
                                            <td>
                                                <!--- Filter Null valuesin address array --->
                                                @php $userPhone = array_filter( $user->phone )  @endphp
                                                <!-- if every value not empty -->
                                                @if ( $userPhone != Null  )
                                                    <ul style="padding-left: 1rem; margin-bottom:0px">
                                                        @foreach ( $userPhone as $phone )
                                                            <li> {{ $phone }} </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-flag-usa"></i> State </td>
                                            <td> {{ $user->state != "" ? $user->state : '-' }} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-location-dot"></i> Address </td>
                                            <td>
                                                <!--- Filter Null valuesin address array --->
                                                @php $userAddress = array_filter( $user->address )  @endphp
                                                <!-- if every value not empty -->
                                                @if ( $userAddress != Null  )
                                                    <ul style="padding-left: 1rem; margin-bottom:0px">
                                                        @foreach ( $userAddress as $address )
                                                            <li> {{ $address }} </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-clock"></i> Created At </td>
                                            <td> {{ $user->created_at != "" ? $user->created_at : '-' }} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-clock"></i> Updated At </td>
                                            <td> {{ $user->updated_at != "" ? $user->updated_at : '-' }} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-shield-halved"></i> Role </td>
                                            <td>
                                                @if ( $user->role == '1' )
                                                    Admin
                                                @elseif( $user->role == '2')
                                                    Editor
                                                @elseif( $user->role == '3')
                                                    User
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
