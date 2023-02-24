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
                    <a href=" <?= url('categories'); ?>">
                        <button class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;
                            
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
        <form action="{{ route('categories.update',$categories->id) }}" method="POST">
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
                                    <input type="text" value="{{ $cate->name }}" name="name" class="form-control " placeholder="Enter Customer Name.." />

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