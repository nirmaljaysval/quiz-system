<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Dashboard</title>
     @vite('resources/css/app.css')
</head>
<body>
   <x-navbar name={{$name}}></x-navbar>
   @if(session('message'))
   <div class="bg-green-800 text-md text-white pl-5">{{session('message')}}</div>
   @endif
   <div class="bg-gray-100 flex flex-col items-center py-8 min-h-screen">
     <div class="bg-white rounded-2xl p-8 shadow-2xl w-full max-w-sm">
    <h2 class="text-2xl text-center text-gray-800 mb-6">Add Category</h2>
    <form action="/add-category" method="post" class="space-y-2">
        @csrf
        <div> 
            <input type="text" name="category" placeholder="Enter category name" class="w-full px-4 py-1 border-gray-200 rounded-xl border-1 focus:outline-none">
            @error('category')
            <div class="text-red-500">{{$message}}</div>
            @enderror
        </div>
       
        <button type="submit" class="w-full rounded-xl bg-blue-500 py-1 text-white mt-1">Add</button>
    </form>
    </div>
   <!-- category list start  -->
   <div class="w-200">
    <h3 class="text-2xl text-blue-500">Category List</h3>
    <ul class="border border-gray-200 p-2">
         <li>
            <ul class="flex justify-between"> 
                <li class="w-30">Sl NO.</li>
                 <li class="w-70">Name</li>
                  <li class="w-70">Creator</li>
                  <li class="w-30">Delete</li>
            </ul>
            
        </li>
        @foreach($categories as $category)
        <li class=" even:bg-gray-200">
            <ul class="flex justify-between"> 
                <li class="w-30">{{$category->id}}</li>
                 <li class="w-70">{{$category->name}}</li>
                  <li class="w-70">{{$category->creator}}</li>
                  <li class="w-30"><a href="/category/delete/{{$category->id}}"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#1f1f1f"><path d="M624-288v-72h144v72H624Zm0-264v-72h240v72H624Zm0 132v-72h192v72H624ZM144-624H96v-72h168v-72h144v72h168v72h-48v360q0 29.7-21.15 50.85Q485.7-192 456-192H216q-29.7 0-50.85-21.15Q144-234.3 144-264v-360Zm72 0v360h240v-360H216Zm0 0v360-360Z"/></svg></a></li>
            </ul>
            
        </li>
        @endforeach
    </ul>

   </di>
    <!-- category list end  -->

</div>
   
</body>
</html>