@extends('backend-template')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-xs-6 col-10">
        <button class="btn btn-warning"><span>Categories Table</span></button>
        
      </div>
      <div class="col-xs-6 col-2">
        <ol class="breadcrumb float-sm-right">
          <a href=" <?= url('categories/create'); ?>">
            <button class="btn btn-dark"><i class="fas fa-folder-plus"></i>&nbsp;
              
            </button>
          </a>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <!-- /.card-header -->

          <table id="" style="text-align: center;" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($category as $categories)
              <tr>
                <td>No</td>
                <td ><span class="btn">{{ $categories->name }}</span></td>
                <td><span class="btn">{{$categories->file}}</span></td>
                <td>
                  <form action="{{ route('categories.destroy',$categories->id) }}" method="POST">

                    <a class="btn " href="{{ route('categories.show',$categories->id) }}"><i class="fas fa-eye" style="font-size:20px;color:dodgerblue"></i></a>

                    <a class="btn" href="{{ route('categories.edit',$categories->id) }}"><i class="fas fa-edit" style="font-size:20px;color:orange"></i></a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" style="border-radius:20px" class="btn"><i class="fas fa-trash" style="font-size:20px"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>


@endsection