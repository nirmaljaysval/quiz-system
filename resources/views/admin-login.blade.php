<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-2xl p-8 shadow-2xl w-full max-w-sm">
    <h2 class="text-2xl text-center text-gray-800 mb-6">Admin login</h2>
    <form action="admin-login" method="post" class="space-y-2">
        @csrf
        <div> @error('user')
            <div class="text-red-500">{{$message}}<div>
            @enderror
            <label for="" class="text-gray-600 mb-1">Admin Name</label>
            <input type="text" name="admin" placeholder="Enter admin name" class="w-full px-4 py-1 border-gray-200 rounded-xl border-1 focus:outline-none">
            @error('admin')
            <div class="text-red-500">{{$message}}<div>
            @enderror
        </div>
        <div>
            <label for="" class="text-gray-600 mb-1">Admin Password</label>
            <input type="password" name="password" placeholder="Enter admin password" class="w-full px-4 py-1 border-gray-200 rounded-xl border-1 outline-0">
            @error('password')
            <div class="text-red-500">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="w-full rounded-xl bg-blue-500 py-1 text-white mt-1">Login</button>
    </form>
</div>
</body>
</html>