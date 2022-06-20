<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/auth.css')}}" rel="stylesheet">
    <style>
        .alert{
            text-transform: capitalize;
            border-radius: 0;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="card-body text-center">
                <div class="mb-4">
                    <img width="100%" class="brand" src="{{asset('assets/img.png')}}" alt="bootstraper logo">
                </div>
                @if($errors->any())
                    @foreach($errors->all() as $err)
                        <p class="alert alert-danger">{{ $err }}</p>
                    @endforeach
                @endif
                @if(session()->has('messages'))
                    <div class="alert alert-danger">
                        {{session()->get('messages')}}
                    </div>
                @endif
                <form action="{{route('post-login')}}" method="POST">
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="username" class="form-label">Username</label>
                        <input type="username" class="form-control" name="username" placeholder="Ketikan username">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="ketikan password">
                    </div>

                    <button name="login" style="width: 100%" class="btn btn-primary shadow-2 mb-4">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
