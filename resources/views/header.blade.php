<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev Team Manager</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #content {
            flex: 1;
        }
        footer {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="https://super7tech.com/web_developer_exam_sr/layout/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="https://super7tech.com/web_developer_exam_sr/layout/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="https://super7tech.com/web_developer_exam_sr/layout/assets/icon/themify-icons/themify-icons.css">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="https://super7tech.com/web_developer_exam_sr/layout/assets/icon/feather/css/feather.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="https://super7tech.com/web_developer_exam_sr/layout/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="https://super7tech.com/web_developer_exam_sr/layout/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://super7tech.com/web_developer_exam_sr/layout/assets/css/jquery.mCustomScrollbar.css">
</head>
<body>
    <header>
        <h1>Dev Team Manager</h1>
        <nav>
            <a href="/">Home</a> |
            <a href="/dashboard">Dashboard</a> |
            <a href="/employees">Employees</a> |

            @if(Auth::check())
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endif

            <!-- a href="/logout">Logout</a -->    
        </nav>
    </header><hr />

    <div id="content">
        @yield('content')
    </div>
