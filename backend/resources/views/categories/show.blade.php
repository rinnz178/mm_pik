@extends('backend-template')

@section('content')

<section class="content-header ">
<div class="container">
<div class="row mb-2">
      <div class="col-xs-6 col-10">
        <button class="btn btn-warning"><span>Category Detail</span></button>
        
      </div>
      <div class="col-xs-6 col-2">
        <ol class="breadcrumb float-sm-right">
          <a href=" <?= url('categories'); ?>">
            <button class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left"></i>
              
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
                                    <h1>{{$categories->name}}</h1>
                                </td>
                                <td>
                                    <p style="text-align: right;margin-top:2px">ID: : &nbsp; <span class="btn btn-info">{{$categories->id}}</span></p>
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