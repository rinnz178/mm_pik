@extends('backend-template')

@section('content')

<section class="content-header ">
<div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Order Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href=" <?= url('order'); ?>">
                        <button class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;
                            Back
                        </button>
                    </a>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    <div class="container mt-5">
        <div class="col-sm-7 mx-auto ">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">

                        <tbody>
                            <tr>
                                <td>
                                    <h1>{{$order->name}}</h1>
                                </td>
                                <td>
                                    <p style="text-align: right;margin-top:2px">ID: : &nbsp; <span class="btn btn-info">{{$order->id}}</span></p>
                                </td>

                            </tr>
                            <tr>
                                <td><i class="fas fa-phone-alt"></i>&nbsp; Phone Number:</td>
                                <td>
                                    {{$order->phone}}
                                </td>

                            </tr>
                            <tr>
                                <td><i class="fas fa-map-marker-alt"></i>&nbsp; Location:</td>
                                <td>
                                    {{$order->location}}
                                </td>

                            </tr>
                            <tr>
                                <td><i class="fas fa-truck"></i>&nbsp; Delivery Fee:</td>
                                <td>
                                    {{$order->deli_fee}}
                                </td>

                            </tr>
                            <tr>
                                <td><i class="fas fa-image"></i>&nbsp; Design Code:</td>
                                <td>
                                    {{$order->design_code}}
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-tshirt"></i>&nbsp; Size:</td>
                                <td>
                                    {{$order->size}}
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-money-bill"></i>&nbsp; Total Amount:</td>
                                <td>
                                    {{$order->total_amount}}
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-sticky-note"></i>&nbsp; Note:</td>
                                <td>
                                    {{$order->note}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>
@endsection