<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="_token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Heritage College of Education') }}</title>

    <link href="{{ URL::asset('assets/images/favicon.ico') }}" rel="icon">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('assets/admin/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/admin/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/admin/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/admin/css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/pages/login.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <!-- /theme JS files -->

    <style>
        .help-block {
            color: red;
        }

        .error {
            color: red;
        }
    </style>

</head>

<body class="login-container bg-slate-800">

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">

                    @if (\Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ \Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    {{ \Session::forget('success') }}
                    @if (\Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ \Session::get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif

                    <!-- Advanced login -->
                    <form id="login_form" action="{{ route('adminLoginPost') }}" method="post">
                        {{-- {!! csrf_field() !!} --}}
                        @csrf
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class=""><img
                                        src="{{ URL::asset('assets/admin/images/bio_apps_logo.png') }}" width="130"
                                        height="50" class=""></div>
                                <h5 class="content-group-lg">Login to your account <small class="display-block">Enter
                                        your credentials</small></h5>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Username">
                                @if ($errors->has('email'))
                                    <h4 class="help-block font-red-mint">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </h4>
                                @endif

                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    id="password">
                                @if ($errors->has('password'))
                                    <span
                                        class="help-block font-red-mint"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn bg-blue btn-block">Login <i
                                        class="icon-circle-right2 position-right"></i></button>
                            </div>

                        </div>
                    </form>
                    <!-- /advanced login -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

</body>

</html>

@section('')
<script type="text/javascript">
    $(document).ready(function() {
        $("#login_form").validate({
            rules: {
                email: "required",
                password: "required",
            },
            messages: {
                email: {
                    required: "Email Field is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 50 characters",
                },
                password: {
                    required: "The Password Field is required",
                    maxlength: "The Password cannot be more than 30 characters"
                },
            }
        });
    });
</script>
@show
