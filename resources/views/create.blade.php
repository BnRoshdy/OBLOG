<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/new_post.css">
    <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>new post</title>
</head>

<body>
    <header> <!----------------------HEADER------------------------>
        <div class="cust_data">
            <a href="#">sign in/up</a>
        </div>
        <a href="#" class="logo_admin">o blog</a>
    </header><!---------------------------------------------------->
    
    <!-- ----------------------------------------------------- -->
    <div class="main">
        <div class="content">

            @if ($errors->any())
                <div class="w-4/5 m-auto">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                                {{ $error }}
                            </li>
                            
                        @endforeach
                    </ul>
                </div>
                
            @endif

            <div>
                <form action="create" method="POST" enctype="multipart/form-data">
                @csrf

            <div class="post">
                <textarea type="text" name="title" class="input" placeholder="Title" v-model="newItem" @keyup.enter="addItem()"
                rows="1" cols="40"></textarea>
                <textarea type="text" name="description" class="input" placeholder="What's on your mind" v-model="newItem" @keyup.enter="addItem()"
                rows="10" cols="40"></textarea>
            </div>

            <div class="centerbuttom" >
                <button v-on:click="addItem()" class='primaryContained float-right' type="submit">POST</button>
                <button v-on:click="addItem()" class='primaryContained float-right' type="submit">ADD IMAGE</button>
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rouned-lg shadow-lg traching-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">

                    </span>
                </label>

            </div>    
            <div class="bg-grey-lighter pt-15" >
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                    <input 
                        type="file"
                        name="image"
                        class="hidden">
                </label>
            </div>
             </form>
            </div>
   
        </div>
    </div>

    {{-- <div class="w-4/5 m-auto pt-20">
        <form 
            action="/blog"
            method="POST"
            enctype="multipart/form-data">
            @csrf
    
            <input 
                type="text"
                name="title"
                placeholder="Title..."
                class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
    
            <textarea 
                name="description"
                placeholder="Description..."
                class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>
    
            <div class="bg-grey-lighter pt-15">
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                    <input 
                        type="file"
                        name="image"
                        class="hidden">
                </label>
            </div>
    
            <button    
                type="submit"
                class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Submit Post
            </button>
        </form>
    </div> --}}
    
            
</body>

</html>