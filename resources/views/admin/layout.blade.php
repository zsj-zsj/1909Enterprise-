<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>>@yield('title')</title>
<link rel="stylesheet" type="text/css" href="/style/admin/css/css.css" />

<link rel="stylesheet" href="/style/admin/js/uploadify/uploadify.css">
<script src="/style/admin/js/uploadify/jquery.js"></script>
<script src="/style/admin/js/uploadify/jquery.uploadify.js"></script>

<script src="/style/admin/js/vue.min.js"></script>
<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    @yield('content')

</body>
</html>