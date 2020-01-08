<!DOCTYPE html>
<html lang="en">
<head>
    <title>ToDoList</title>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel='stylesheet'>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- navbar -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    ToDoList
                </a>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>