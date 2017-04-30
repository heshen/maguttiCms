<!DOCTYPE html>
<html>
<head lang="{!! LaravelLocalization::getCurrentLocale() !!}">
	<title>{!! config('maguttiCms.admin.option.title') !!}</title>
	<!-- Latest compiled and minified CSS -->


	{{--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300"/>--}}
	<link rel="stylesheet" href="{!! asset(config('maguttiCms.admin.path.plugins').'uploadifive/uploadifive.css')!!}">
	<link rel="stylesheet" href="/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="/boostrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="{!! asset(config('maguttiCms.admin.path.plugins').'select2/css/select2.min.css') !!}">
	<link rel="stylesheet" href="{!! asset(config('maguttiCms.admin.path.plugins').'custom-scrollbar/jquery.mCustomScrollbar.min.css')!!}" />
	<link rel="stylesheet" href="{!! asset(config('maguttiCms.admin.path.common_css').'ma_helper.css')!!}">
	<link rel="stylesheet" href="{!! asset(config('maguttiCms.admin.path.cms_css').'bootstrap-theme.css')!!}">
	<link rel="stylesheet" href="{!! asset(config('maguttiCms.admin.path.cms_css').'admin.css')!!}">
	<script>
        // init  some   global  variable
        var    _SERVER_PATH  = "{!! url('') !!}";
        var    _LOCALE 		 = "{!! LaravelLocalization::getCurrentLocale() !!}";
        var    _CURMODEL 	 = "{!! ( isset($pageConfig['model']) ? $pageConfig['model'] : "" ) !!}";
	</script>
</head>
<body class="{{(in_array($view_name, ['admin-login', 'auth-password']))? 'no-margin': ''}}">
@include('admin.common.navbar')

@yield('content')
</body>
<!-- Latest compiled and minified JavaScript -->
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/boostrap/3.3.7/js/bootstrap.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="{!! asset(config('maguttiCms.admin.path.plugins').'custom-scrollbar/jquery.mCustomScrollbar.concat.min.js')!!}"></script>
<script src="{!! asset(config('maguttiCms.admin.path.cms_js').'cms.js')!!}"></script>
<script src="{!! asset(config('maguttiCms.admin.path.plugins').'notify.min.js')!!}"></script>
<script src="{!! asset(config('maguttiCms.admin.path.plugins').'tinymce/tinymce.min.js')!!}"></script>
<script src="{!! asset(config('maguttiCms.admin.path.plugins').'bootbox.js') !!}"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        Cms.init();
    });
</script>
@yield('footerjs')
</html>
