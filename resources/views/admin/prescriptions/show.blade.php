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
                                        <h2 class="fs-5 fw-bold mb-0"> <i class="fa-solid fa-eye text-primary"></i> Prescription Details</h2>
                                    </div>
                                    <div class="col text-end">
                                        <a href="{{ route("admin.prescriptions.edit" , $prescription->id) }}" class="btn btn-sm btn-primary"> 
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <a href="{{ route('admin.prescriptions.destroy', $prescription->id) }}" class="btn btn-sm btn-danger delete-record">
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
                                            <td> {{ $prescription->id != "" ? $prescription->id : '-'}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-user"></i> User </td>
                                            <td> 
                                                <a href="{{ route('admin.users.show', $prescription->user->id) }}" class="text-decoration-underline">
                                                    {{ $prescription->user->name }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-address-card"></i> Age </td>
                                            <td> {{ $prescription->age != "" ? $prescription->age : '-'}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-venus-mars"></i> Gender </td>
                                            <td> {{ $prescription->gender != "" ? $prescription->gender : '-'}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize" style="vertical-align: top;"> <i class="fa-solid fa-capsules"></i> Medicine </td>
                                            <td>
                                                @if ( $prescription->medicine == '')
                                                    -
                                                @else 
                                                    <ul style="padding-left: 1rem; margin-bottom:0px">
                                                        @foreach ( $prescription->medicine as $medicine )
                                                            <li> {{ $medicine }} </li>
                                                        @endforeach
                                                    </ul>
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-list-check"></i> Validation </td>
                                            <td> 
                                                @if ( $prescription->validation == '0')
                                                    <span class="badge super-badge bg-danger"> <i class="fa-solid fa-x"></i> Not Valid </span>
                                                @elseif ( $prescription->validation == '1')
                                                    <span class="badge super-badge bg-warning"> <i class="fa-solid fa-spinner"></i> Pending </span>
                                                @elseif ( $prescription->validation == '2')
                                                    <span class="badge super-badge bg-success"> <i class="fa-solid fa-check"></i> Valid </span>
                                                @endif    
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-calendar"></i> Schedule Orders </td>
                                            <td> 
                                                @if ( $prescription->schedule_orders == '0')
                                                    <span class="badge super-badge bg-danger"> <i class="fa-solid fa-x"></i> OFF </span>
                                                @elseif ( $prescription->schedule_orders == '1')
                                                    <span class="badge super-badge bg-success"> <i class="fa-solid fa-check"></i> ON </span>
                                                @endif    
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-align-left"></i> Additional Details </td>
                                            <td class="product-desc"> 
                                                <div>
                                                    {{ $prescription->additional_details != "" ? $prescription->additional_details : '-'  }} 
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-image"></i> Image </td>
                                            <td class="product-image"> 
                                                <a class="show-img-container" href="{{ asset('images/prescriptions/'.$prescription->img) }}">
                                                    <img src="{{ asset('images/prescriptions/'.$prescription->img) }}" alt="product-image">    
                                                </a>
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
