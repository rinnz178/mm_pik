@extends('backend-template')

@section('content')

<section class="content-header ">

    <div class="container">
        <div class="row mb-2">
            <div class="col-xs-6 col-9">
                <h1>Categories Create Form</h1>
            </div>
            <div class="col-xs-6 col-3">
                <ol class="breadcrumb float-sm-right">
                    <a href=" <?= url('categories'); ?>">
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
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-10 col-xs-12 mx-auto">
                    <div class="card card-dark">
                        <div class="card-body">
                            <!-- Date -->
                            <div class="form-group">
                                <strong>Image:</strong>
                                <input type="file" name="image" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Category Name</label>
                                <div class="input-group date" data-target-input="nearest">
                                    <input type="text" name="name" class="form-control " placeholder="Enter Category name..." />
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