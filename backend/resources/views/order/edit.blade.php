@extends('backend-template')

@section('content')

<section class="content-header ">

    <div class="container">
        <div class="row mb-2">
            <div class="col-xs-6 col-9">
                <h1>Orders Edit Form</h1>
            </div>
            <div class="col-xs-6 col-3">
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
</section>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- Main content -->
<section class="content">
    <div class="container">
        <form action="{{ route('order.update',$order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="col-10 col-xs-12 mx-auto">
                    <div class="card card-dark">
                        <div class="card-body">
                            <!-- Date -->
                            <div class="form-group">
                                <label>Customer Name:</label>
                                <div class="input-group ">
                                    <input type="text" value="{{ $order->name }}" name="name" class="form-control " placeholder="Enter Customer Name.." />

                                </div>
                            </div>

                            <div class="form-group">
                                <label>Phone Number:</label>
                                <div class="input-group date" data-target-input="nearest">
                                    <input type="text" value="{{ $order->phone }}" name="phone" class="form-control " placeholder="Enter Phone Number.." />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>T-shirt Size:</label>
                                <select class="form-control select2"  name="size" style="width: 100%;">
                                    <option selected="selected" class="form-control" value="M" >{{ $order->size }} (Old Size)</option>
                                    <option value="M">M size</option>
                                    <option value="L">L size</option>
                                    <option value="XL">XL size</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Delivery Fee:</label>
                                <div class="input-group date" data-target-input="nearest">
                                    <input type="text" name="deli_fee" value="{{ $order->deli_fee }}" class="form-control " placeholder="Enter Deli Fee.." />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Design Code:</label>
                                <div class="input-group date" data-target-input="nearest">
                                    <input type="text" name="design_code" value="{{ $order->design_code }}"  class="form-control" placeholder="Enter Code.." />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Total Amount:</label>
                                <div class="input-group date" data-target-input="nearest">
                                    <input type="text" name="total_amount" class="form-control" value="{{ $order->total_amount }}"  placeholder="Enter Total Amount.." />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Location:</label>
                                <div class="input-group date" data-target-input="nearest">
                                    <textarea name="location" class="form-control " placeholder="Enter Location..">{{ $order->location }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Note:</label>
                                <div class="input-group date" data-target-input="nearest">
                                    <textarea class="form-control " name="note" placeholder="Enter Note..">{{ $order->note }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="input-group " data-target-input="nearest">
                                    <button class="form-control btn btn-dark">Confirm</button>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </form>
        <!-- /.container-fluid -->
</section>

</section>
@endsection