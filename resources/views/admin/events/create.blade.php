@extends('admin.layouts.app')

@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
            </div>

            @include('errors.errors')

            <div class="card-content">
                <h4 class="card-title">Banners</h4>
                <form enctype="multipart/form-data" method="post" action="{{ route('admin.events.store') }}" class="form-horizontal">
                    @csrf

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label"> Title</label>
                        <div class="col-sm-6">
                            <input type="text" name="title" value="{{  old('title')   }}" class="form-control" id="title" placeholder="title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="link" class="col-sm-2 control-label">Date of event</label>
                        <div class="col-sm-6">
                            <input class="form-control  datepicker pull-right" name="date_of_event" id="datepicker" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-6">
                            <select name="type" required="required" class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">--choose one--</option>
                                <option value="present">Present</option>
                                <option value="upcoming">Upcoming</option>
                            </select>
                        </div>
                    </div>


                    <div class="row ">


                        <div class="form-group col-md-12">
                            <label class="control-label">Description</label>
                            <div class="form-group ">
                                <div class="col-sm-12">
                                    <label class="control-label"> </label>
                                    <textarea name="description"
                                        id="description" class="form-control" rows="7"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div id="j-drop" class="j-drop">
                            <input accept="image/*" required="true" data-msg="Upload  at least 5 images" onchange="getFile(this,'images[]')" class="upload_input" multiple="true" type="file" id="upload_file_input" name="product_image" />
                            <div class="upload-text">
                                <a class="" href="#">
                                    <img src="/backend/img/upload_icon.png">
                                    <b>Click on anywhere to upload image</b>
                                </a>
                            </div>
                            <div id="j-details" class="j-details"></div>
                        </div>
                    </div>


                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info btn-round pull-right">Submit</button>
                    </div>
                    <!-- /.box-footer -->
                </form>

            </div>
        </div>
    </div>

</div>

@endsection

@section('page-scripts')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('backend/js/products.js') }}"></script>
<script src="{{ asset('backend/js/uploader.js') }}"></script>
@stop

@section('inline-scripts')

CKEDITOR.replace('description',{
height: '400px'
})


let activateFileExplorer = 'a.activate-file';
let delete_image = 'a.delete_image';
var main_file = $("input#file_upload_input");
Img.initUploadImage({
url:'/admin/upload/image?folder=banners',
activator: activateFileExplorer,
inputFile: main_file,
});
Img.deleteImage({
url:'/admin/delete/image?folder=banners&model=Banner',
activator: delete_image,
inputFile: main_file,

});


@stop

@section('pagespecificscripts')
@stop