<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MLM</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    
    
    <style>
        body{
            /* background-image: url("{{ asset('images/pexels-magda-ehlers-3575827.jpg') }}"); */
            background-color: #121F20;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            font-family: 'Rubik', sans-serif;
            color: white;
        }

        .container {
            background-color: #121F20;
            width: 400px;
            position: absolute;
            padding: 40px;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            text-align: center;
            border: 2px solid white;

            border-top-left-radius: 100px;
            border-bottom-right-radius: 100px;
        }

		.alert{
			margin: 20px auto;
			width: 250px;
			border: 2px solid red;
		}

		.alert ul{
			padding-left: 20px;
		}

        /* .login {
            margin:-90px 0px 30px 0px;
        } */

        .login img{
            height:100px;
            width:100px;
            margin-bottom: 10px;
        }

        .login input[type="text"], .login input[type="password"] {
            display: block;
            color: white;
            margin: 20px auto;
            padding: 10px 10px;
            width: 250px;
            background: none;
            border: 2px solid white;
            box-sizing: border-box;
            border-radius: 5px;
            transition: 0.8s;
        }

        .login input[type="text"]:focus, .login input[type="password"]:focus {
            border-left: 40px solid white;
        }

        .login input[type="submit"]{
            background: none;
            border: 2px solid white;
            padding: 10px 10px;
            width: 100px;
            margin: 10px 10px;
            border-radius: 15px;
            color: white;
        }

        .login input[type="submit"]:hover {
            background: white;
            color: black;
        }

        @media (max-width: 575.98px) {
            .container {
                border-radius: 0px;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <form method="POST" class="login" action="{{ url('login') }}">
            @csrf

            <img src="{{ asset('images/logo_creogram-01.png') }}" >
            <h1><b>Creogram</b></h1>
            @if(count($errors) > 0)
            <div class="alert alert-danger pt-3 pl-3 pr-3 pb-1">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(\Session::has('error'))
                <div class="alert alert-danger pt-3 pl-3 pr-3 pb-1">
					<ul>
                    	<li>{{\Session::get('error')}}</li>
					</ul>
				</div>
            @endif
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="LOGIN">
        </form>
    </div>
</body>
</html>