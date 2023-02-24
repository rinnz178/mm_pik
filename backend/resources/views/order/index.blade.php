@extends('backend-template')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-xs-6 col-9">
        <button class="btn btn-warning"><span>New Orders Table</span></button>
      </div>
      <div class="col-xs-6 col-3">
        <ol class="breadcrumb float-sm-right">
          <a href=" <?= url('order/create'); ?>">
            <button class="btn btn-dark"><i class="fas fa-folder-plus"></i>&nbsp;
              Add Order
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
                <th>O-Code</th>
                <th>Name</th>
                <th>Total</th>
                <th> Photo</th>
                <th>Cancel</th>

                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order as $orders)
              <tr>
                <td><span class="btn">{{ $orders->id }}</span></td>
                <td ><span class="btn">{{ $orders->name }}</span></td>
                <td><span class="btn">{{$orders->total_amount}}</span></td>
                <td style="text-align:center">
                  {{-- @if ($orders->status==0)
                  <a class="btn " href="{{url('changeStatus/'.$orders->id)}}" style="border-radius:20px;color:limegreen"><i class="fas fa-check-circle" style="font-size:20px"></i></a>

                  @else
                  <a class="btn " href="{{url('changeStatus/'.$orders->id)}}" class="btn btn-sm btn-warning" style="border-radius:20px"><i class="fas fa-exclamation"></i>&nbsp;Back to New</a>
                  @endif --}}

                  <img src="{{ asset("cover/$orders->photo")}}" style="width:60px"/>
                  {{-- {{ $orders->photo }} --}}

                </td>
                <td>
                  @if ($orders->status==0)
                  <a class="btn " href="{{url('changeCancel/'.$orders->id)}}" style="border-radius:20px;color:red"><i class="fas fa-ban" style="font-size:20px"></i> &nbsp; </a>
                  @endif
                </td>
                <td>
                  <form action="{{ route('order.destroy',$orders->id) }}" method="POST">

                    <a class="btn " href="{{ route('order.show',$orders->id) }}"><i class="fas fa-eye" style="font-size:20px;color:dodgerblue"></i></a>

                    <a class="btn" href="{{ route('order.edit',$orders->id) }}"><i class="fas fa-edit" style="font-size:20px;color:orange"></i></a>

                    <!-- @csrf
                    @method('DELETE')

                    <button type="submit" style="border-radius:20px" class="btn"><i class="fas fa-trash" style="font-size:20px"></i></button> -->
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