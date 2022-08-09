@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Add Service</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/service') }}" class="btn btn-primary">List Service</a>
            </div>
        </div>
        <div class="panel-body">

            {!! Form::open(['url' => 'admin/service','role' => 'form', 'class'=>'form-vertical', 'id' => 'notice_form','files' => true ]) !!}

            <div class="form-group">
                <label class="control-label text-bold" for="title">Title <span class="required-fields">*</span></label>
                <input type="text" name="title" id="title" class="form-control" required data-msg-required="Please enter notice title.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="small_description">Small Description <span class="required-fields">*</span></label>
                <textarea class="form-control" rows="5" id="small_description" name="small_description" required data-msg-required="Please enter small description."></textarea>
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label for="description" class="text-bold">Description <span class="required-fields">*</span></label>
                <textarea class="form-control" name="description" id="description" rows="5" required data-msg-required="Please enter description."></textarea>
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="display_image">Display Image</label>
                <input type="file" name="display_image" id="display_image" class="form-control" accept="image/x-png,image/gif,image/jpeg,image/jpg" data-msg-required="Please select a display image file.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="banner_image">Service Banner Image</label>
                <input type="file" name="banner_image" id="banner_image" class="form-control" accept="image/x-png,image/gif,image/jpeg,image/jpg" data-msg-required="Please select a banner image file.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="footer_image">Footer Image</label>
                <input type="file" name="footer_image" id="footer_image" class="form-control" accept="image/x-png,image/gif,image/jpeg,image/jpg" data-msg-required="Please select a footer image file.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('footer_script')

    <link href="{{ URL::asset('assets/admin/js/jquery-validation/jquery-validate.css') }}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}"></script>
    <script src="//cdn.tiny.cloud/1/5lrxjaz6k4182tsdt4ftj6ezr145iiaejnw9nrannsilrejn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea.form-control',
                plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen link template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount textpattern noneditable help charmap quickbars emoticons',
                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | template link anchor codesample | ltr rtl',
                menubar: 'file edit view insert format tools table help',
                toolbar_sticky: true,
                toolbar_mode: 'sliding',
                height: 300,
                image_caption: true,
                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quicktable',
                contextmenu: 'link table',
            });

            $('#notice_form').validate({
                ignore: [],
                errorPlacement: function errorPlacement(error, element) {
                    $(element).parents('div.form-group').find('span.validation-errors').append(error);
                },
                onfocusout: false,
                highlight: function (element, errorClass) {
                    if ($(element).hasClass('select-2')) {
                        $(element).next('.select2-container').addClass(errorClass);
                    } else {
                        $(element).addClass(errorClass);
                    }
                },
                unhighlight: function (element, errorClass) {
                    if ($(element).hasClass('select-2')) {
                        $(element).next('.select2-container').removeClass(errorClass);
                    } else {
                        $(element).removeClass(errorClass);
                    }
                },
            });
        });
    </script>
@endsection
