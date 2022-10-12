<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.csss') }}">
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config={
            theme:{
                extend:{
                    colors:{
                         laravel:'#ef3b2d',
                    },
                },
            },
        }
    </script>
    <title>Laracrash | Find Laravel Jobs & Projects</title>
</head>
<body class= "mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/">
            <img class="w-24" src="{{asset('images/logo.png')}}" class="logo" alt="no picture">
        </a>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <a href="register.html" class="hover:text-laravel">
                    <i class="fa-solid fa-user-plus"></i>Register
                </a>
            </li>
            <li>
            <a href="login.html" class="hover:text-laravel">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>Login
                </a>
            </li>
        </ul>
    </nav>
    
    <main>
           {{$slot}}
   </main>
    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start
    font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">Copyrigth &copy; 2022 , All rights reserved</p>
    <a href="create.html" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5" >Post Job</a>
</footer>
</body>
</html>