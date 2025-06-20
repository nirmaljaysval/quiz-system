<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
     @vite('resources/css/app.css')
</head>
<body>
    <nav class="flex justify-between px-4 py-2 items-center shadow-md bg-white">
        <div class="text-xl text-gray-500 hover:text-blue-500 cursor-pointer">
            Quiz System
        </div>
         <div class="space-x-4">
           <a href="" class="text-gray-500 hover:text-blue-400">Category</a>
           <a href="" class="text-gray-500 hover:text-blue-400">Quiz</a>
           <a href="" class="text-gray-500 hover:text-blue-400">Login</a>
            <a href="">Welcome {{$name}}</a>

        </div>
    </nav>
</body>
</html>