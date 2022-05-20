<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/post.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>our blog</title>
</head>
<body>
    <header> <!----------------------HEADER------------------------>
        <div class="cust_data">
            @if(Auth::check())
        
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method = "POST" >
          @csrf
      </form>
@else
<a href="/login">login / register</a>

@endif
        </div>
        <a href="/" class="logo_admin">OBLOG</a>
    </header><!---------------------------------------------------->





    <!-------------------NAVBAR--------------------------->
    <section class="sticky">
        <div class="navbar">
            <ul dir="rtl">
                <li><a href="/">NewAnime </a></li>
                <li><a href="/Movies">Movies</a></li>                
                <li><a href="/Manga">Manga</a></li>
                <li><a href="/recommend">Recommend</a></li>
            </ul>
        
        
        </div>
    </section><!---------------------------------------------------->

    <section>
        <div class="content1">
            <div class="main-artical">
                @foreach ($post as $a )
                    <a href="#"><img src="{{ url('image/postPic/'.$a->image_path) }}"></a>
                    
                    <h1 align="center">{{$a->title}}</h1>
                    <p>    
                        {{$a->description}}
                    </p>
                    
                        <small>created_at {{$a->created_at}}</small>
                    @endforeach

                    <div class="creator">
                        @foreach ($name as $n)                            
                        
                        <div class="icon-image">
                            <a href="#"><img src="{{ url('image/user.png') }}"></a>
                        </div>
                        <div class="icon-words">
                            <h1>Creator</h1>
                            <a href="#"><h3>{{$n->name}}</h3></a>
                            <p>
                               
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                voluptatem deleniti porro vitae amet iste totam vero.
                            </p>

                        </div>
                        @endforeach
                    </div>


                @if (Auth::check())
            <form method="POST" action="{{route('ahmed')}}" >
                @csrf
                    <div class="comment">
                        
                        <textarea type="text" class="input" placeholder="Write a comment" name="description" v-model="newItem" @keyup.enter="addItem()"></textarea>
                        {{-- <button v-on:click="addItem()" class='primaryContained float-right' type="submit" value="POST">Add Comment</button> --}}
                        <input class='primaryContained float-right' type="submit" value="POST">
                        
                    </div>
                </form>
                @endif

                
                @foreach ($comment as $c)
                                    
                <div class="creator">
                    <div class="icon-image">
                        <a href="#"><img src="{{ url('image/user.png') }}"></a>
                    </div>
                    <div class="icon-words">
                        <a href="#"><h3>human comment</h3></a>
                        <p>
                            {{$c->description}}
                        </p>

                    </div>
                </div>
                @endforeach

            </div>
            
                <div class="main-aside">
                    <h2>Pined</h2>
                    <a href="#"><img src="{{ url('image/Elon.jpg') }}"></a>
                    
                </div>
            
        </div>
    </section>



    <!---------------------footer------------------------->
    <footer>
        <div class="footer-top-area">

            <div class="container">
                <div class="footer-about-us">
                <h2><span>our blog</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur,
                    modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                <div class="footer-social">
                    <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" target="_blank"><i class="fa-brands fa-twitter-square"></i></a>
                </div>
                </div>
            </div>

            <div class="footer-menu">
                <h2 class="footer-wid-title">Help Center</h2>
                <ul>
                <li>Mobile Phone : 01000002222088821 </li>
                </ul>                        
            </div>

            <div class="footer-menu">
                <h2 class="footer-wid-title">User Navigation </h2>
                <ul>
                    <li><a href="#">our policies</a></li>
                    <li><a href="#">more about us</a></li>
                </ul>                        
            </div>

        </div>
    </footer>
</body>
</html>