<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" {{ url ( 'css/edit.css' ) }} ">
    <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Edit Profile</title>
</head>

<body>
    <header> <!----------------------HEADER------------------------>
        <div class="cust_data">
            <a href="#">sign in/up</a>
        </div>
        <a href="#" class="logo_admin">o blog</a>
    </header><!---------------------------------------------------->



    <section>
    <!-------------------NAVBAR--------------------------->
    <section class="sticky">
        <div class="navbar">
            <ul>
                <li><a href="#">home</a></li>
                <li><a href="#">home</a></li>
                <li><a href="#">home</a></li>
                <li><a href="#">home</a></li>
                <li><a href="#">home</a></li>
                <li><a href="#">home</a></li>
            </ul>
        </div>
    </section>
    <!-- ----------------------------------------------------- -->
    <div class="main">
        <div class="content">
             <form method="POST" class="user" action="{{ route('user.edit') }}">
            @csrf
            @foreach ($data as $a)
                <div class="info">
                    <div class="input-box">
                        <label for="20">first Name</label>
                        <input type="text" id="20" name="first name" value="{{$a->first_name}}">
                    </div>
                    <div class="input-box">
                        <label for="Last">Last Name</label>
                        <input type="text" id="21"  name="last name" value="{{$a->last_name}}">
                    </div>
                    <div class="input-box">
                        <label for="User">User_name</label>
                        <input type="text" id="23" name="user name" value="{{$a->user_name}}" >
                    </div>
                    <div class="input-box">
                        <label for="Email">Email</label>
                        <input type="email" id="24"  name="email" value="{{$a->email}}" >
                    </div>
                  
                </div>
             @endforeach;
   
                <div class="up" >
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Update">
                </div>
                
    
            </form>

        </div>
        <div class="card">
            <div class="picture">
                <a href="#">
                    <i class="fa-solid fa-pen"></i>
                    <!-- <i class="fa-light fa-pen"></i> -->
                    <!-- <i class="far fa-pencil-alt"></i> -->
                </a>
                <img src="img/user.png" alt="">
                <div>User name</div>
            </div>
            <div class="list">
                <ul>
                    <li>
                        <a href="{{ url('/home') }}">
                            <div>Home</div>
                            <i class="fa-solid fa-house-chimney"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.profile') }}">
                            <div>My Profile</div>
                            <i class="fa-solid fa-house-chimney"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.edit') }}">
                            <div>Edit Profile</div>
                            <i class="fa-solid fa-user-pen"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.update_password') }}">
                            <div>Edit Password</div>
                            <i class="fa-solid fa-key"></i>
                        </a>
                    </li>
                
                    <li>
                        <a href="{{ route('user.comments') }}">
                            <div>My Comments</div>
                            <i class="fa-solid fa-comments"></i>
                        </a>
                    </li>
              
                </ul>
                <div class="out">
                    <a href="{{ route('logout') }}">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>Sign Out</span>
                    </a>
                </div>
            </div>
        </div>
        
    </div>
</body>

</html>