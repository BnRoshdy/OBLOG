<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/home1.css') }}">
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
        <a href="/" class="logo_admin">o blog</a>
    </header><!---------------------------------------------------->



    <section>
    <!-------------------NAVBAR--------------------------->
    <section class="sticky">
        <div class="navbar">
            <ul dir="rtl">
                <li><a href="#">home1</a></li>
                <li><a href="#">home2</a></li>
                <li><a href="#">home3</a></li>
                <li><a href="#">home4</a></li>
            </ul>
        </div>
    </section>
    <!---------------------------------------------------->
        <div class="content1">
            <div class="main-artical">
            <a href="#"><img src="{{ url('image/elon.jpg') }}"></a>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="main-aside">
                <h2>Pined</h2>
                <a href="#"><img src="{{ url('image/Elon.jpg') }}"></a>
                
            </div>

                    
                    

                    @foreach ($posts as $post)
                        <div class="sub-content">
                        <li>
                        <a href="home2/{{ $post->id }}"><img src="{{ url($post->image_path) }}"></a>
                        <div class="insides" style='colore:white'>
                        <h3 style="color: white"><a href="home2/{{ $post->id }}">{{$post->title}} </a></h3>
                        <p>{{$post->description}}</p>
                        <small float='left' style="color: white">Created at {{$post->created_at}}</small>
                        {{-- <small align='left' style="color: white">Created by {{$post->created_by}}</small> --}}
                        </li>
                        </div>            
                        @endforeach
    
                {{-- <div class="insides">
                    <a href="#"><img src="image/Elon.jpg"></a>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                </div> --}}

                
                
                <div class="comment">
                    <button v-on:click="addItem()" class='primaryContained float-right' type="submit">see more</button>
                </div>
            </div>
        </div>
        </div>
    </section>



    <!---------------------footer------------------------->
    <footer>
        <div class="footer-top-area">

            <div class="container">
                <div class="footer-about-us">
                <h2><span>our blog</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
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