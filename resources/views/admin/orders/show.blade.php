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
                                        <h2 class="fs-5 fw-bold mb-0"> <i class="fa-solid fa-eye text-primary"></i> Order Details</h2>
                                    </div>
                                    <div class="col text-end">
                                        <a href="{{ route("admin.orders.edit" , $order->id) }}" class="btn btn-sm btn-primary"> 
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <a href="{{ route('admin.orders.destroy', $order->id) }}" class="btn btn-sm btn-danger delete-record">
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
                                            <td> {{ $order->id != "" ? $order->id : '-'}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-user"></i> User </td>
                                            <td> 
                                                <a href="{{ route('admin.users.show', $order->user->id) }}" class="text-decoration-underline">
                                                    {{ $order->user->name }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-location-dot"></i> Shipping Address </td>
                                            <td> {{ $order->address != "" ? $order->address : '-'}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-phone-volume"></i> Shipping Phone </td>
                                            <td> {{ $order->phone != "" ? $order->phone : '-'}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"  style="vertical-align: top;"> <i class="fa-solid fa-box-open"></i> Products </td>
                                            <td class="order-products-container"> 
                                                @foreach ( $order->cart as $product_id => $quantity )
                                                    @php
                                                        $product = App\Models\Product::find($product_id); 
                                                    @endphp
                                                    <div class="order-products">
                                                        <div class="show-img-container">
                                                            <img src="{{ asset("images/products/".$product->img) }}" alt="product-img" class="img-fluid">
                                                        </div>
                                                        <div class="row my-auto flex-column flex-md-row">
                                                            <span> <span class="font-wieght-bold"> Product Name: </span> {{ $product->title }} </span>
                                                            <span> <span class="font-wieght-bold"> price: </span> {{ $product->final_price }}$ </span>
                                                            <span> <span class="font-wieght-bold"> Qty: </span> {{ $quantity }} </span>
                                                            <span> <span class="font-wieght-bold"> Total Price: </span> {{ ( $product->final_price * $quantity ) }}$ </span>    
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-money-bill-1"></i> Subtotal </td>
                                            <td class="product-price"> {{ $order->subtotal != "" ? $order->subtotal : '-'  }}<i class="fa-solid fa-dollar-sign"></i> </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-percent"></i> Taxes Percentage </td>
                                            <td> {{ $order->taxes_percentage != "" ? $order->taxes_percentage : '-'  }}% </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-chart-pie"></i> taxes </td>
                                            <td class="product-price"> {{ $order->taxes != "" ? $order->taxes : '-'  }}<i class="fa-solid fa-dollar-sign"></i> </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-truck-ramp-box"></i> Shiping </td>
                                            <td class="product-price"> {{ $order->shiping != "" ? $order->shiping : '-'  }}<i class="fa-solid fa-dollar-sign"></i> </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fa-solid fa-money-bill-1"></i> Total </td>
                                            <td class="product-price"> {{ $order->total != "" ? $order->total : '-'  }}<i class="fa-solid fa-dollar-sign"></i> </td>
                                        </tr>
                                        <tr>
                                            <td class="text-capitalize"> <i class="fas fa-shipping-fast"></i> Status </td>
                                            <td>
                                                @if ( $order->status == '1')
                                                    <span class="badge super-badge bg-warning"> <i class="fas fa-clipboard-list"></i> Processed </span>
                                                @elseif ( $order->status == '2')
                                                    <span class="badge super-badge bg-warning"> <i class="fas fa-box-open"></i> Shipped </span>
                                                @elseif ( $order->status == '3')
                                                    <span class="badge super-badge bg-warning"> <i class="fas fa-shipping-fast"></i> En Route </span>
                                                @elseif ( $order->status == '4')
                                                    <span class="badge super-badge bg-success"> <i class="fas fa-home"></i> Arrived </span>
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
