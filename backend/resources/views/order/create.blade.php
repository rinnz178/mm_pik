@extends('backend-template')
@section('title', 'Image Create')
@section('content')
<style>
    .file-upload {
        background-color: #ffffff;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 2px dashed black;
        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: gray;
        border: 2px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: black;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        /* border-bottom: 4px solid #b02818; */
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }
</style>

<section class="content-header ">

    <div class="container">
        <div class="row mb-2">
            <div class="col-xs-6 col-9">
                <h1>Orders Create Form</h1>
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
        <form action="{{ route('order.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-10 col-xs-12 mx-auto">
                    <div class="card card-dark">
                        <div class="card-body">
                            <!-- Date -->
                            <div class="form-group">
                                <label>Design Name:</label>
                                <div class="input-group ">
                                    <input type="text" name="name" class="form-control " placeholder="Enter Customer Name.." />

                                </div>
                            </div>

                            <div class="form-group">
                                <label>Design Code</label>
                                <div class="input-group date" data-target-input="nearest">
                                    <input type="text" name="design_code" class="form-control " placeholder="Enter Phone Number.." />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Plan</label>
                                <select class="form-control select2" name="status" style="width: 100%;">
                                    <option selected="selected" class="form-control" disabled>Choose Plan</option>
                                    <option value="0">Premium</option>
                                    <option value="1">Free</option>
                                    < </select>
                            </div>

                            <div class="form-group">
                                <label>Photo</label>
                                <div class="file-upload">
                                    <!-- <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button> -->

                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input" type='file' name="photo" onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h3>Drag and drop a file or select add Image</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Description:</label>
                                <div class="input-group date" data-target-input="nearest">
                                    <textarea name="description" class="form-control " placeholder="Enter Location.."></textarea>
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

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
</script>
@endsection