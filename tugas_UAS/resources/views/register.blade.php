<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
    .main{
        height: 120vh;
    }
    .register-box{
        width: 500px;
        border: solid 1px;
        padding: 1px;
    }
    form div{
        padding: 13px;
    }
</style>
<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
            @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
            @endif
            @if (session('status'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
            @endif
        <div class="register-box">
            <form action="" method="post">
                @csrf
                <div>
                    <label for="username" class="from-label ">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required >
                </div>
                <div>
                    <label for="password" class="from-label" >Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div>
                    <label for="phone" class="from-label ">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" >
                </div>
                <div>
                    <label for="adress" class="from-label ">Adress</label>
                    <textarea name="adress" id="adress" class="form-control" rows="4" required></textarea>
                </div>
                <div >
                    <button type="submit" class="btn btn-primary form-control">Register</button>
                </div>
                <div class="text-center">
                    Already have an account?<a href="login">Login</a>
                </div>
            </form>
        </div>
    </div>
 

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>