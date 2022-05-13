<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=10,user-scalable=no,initial-scale=1.0">

    <link rel="stylesheet" href="{{ url('/css/app.css') }}"/>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>


    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">

    
    <!-- Bootstrap core CSS -->
    <!--====== Title ======-->
    <title>Alliance4ai</title>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <link rel="stylesheet" href="/css/slick.css">
    <!--====== Animate css ======-->
    <link rel="stylesheet" href="/css/animate.css">
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="/css/nice-select.css">
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="/css/jquery.nice-number.min.css">
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--====== Default css ======-->
    <link rel="stylesheet" href="/css/default.css">
    <!--====== Style css ======-->
    <link rel="stylesheet" href="/css/style.css">
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="/css/responsive.css">
    <!--====== Style css ======-->
    <link rel="stylesheet" href="/css/dashboard.css">
    
</head>
<body>
    <div>
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Alliance4ai</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    @auth
                        <form action="{{ route('logout') }}"  method="post">
                            @csrf
                            <a class="nav-link px-3" href="#"><button type="submit" class="btn btn-light">Sign out</button></a>
                        </form>
                    @endauth

                    @guest
                        <a class="nav-link px-3" href="{{ route('login') }}" >Login</a>
                    @endguest
                    
                </div>
            </div>
        </header>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/" style="color:#115978">
                                <i class="fa fa-home pr-1" aria-hidden="true" style="font-size:20px; color:#115978"></i>
                                Dashboard
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('community') }}" style="color:#115978">
                                <i class="fa fa-users pr-1" aria-hidden="true" style="font-size:20px; color:#115978"></i>
                                Community
                                </a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="">
                                <i class="fa fa-tasks" style="font-size:15px"></i>
                                Jobs
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('discussion') }}" style="color:#115978">
                                <i class="fa fa-quote-right pr-1" style="font-size:20px; color:#115978"></i>
                                Discussions
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('groups') }}" style="color:#115978">
                                <i class="fa fa-circle-o-notch pr-1" style="font-size:20px; color:#115978"></i>
                                Circles
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('topics') }}" style="color:#115978">
                                <i class="fa fa-television pr-1" style="font-size:20px; color:#115978"></i>
                                Topics
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('learning') }}" style="color:#115978">
                                <!-- <span data-feather="file-text"></span> -->
                                <i class="fa fa-graduation-cap pr-1" style="font-size:20px; color:#115978"></i>
                                Learning
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('fullcalendareventmaster') }}">
                                <i class="fa fa-calendar" style="font-size:15px"></i>
                                Events
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('hackathons') }}" style="color:#115978">
                                <i class="fa fa-hourglass-half pr-1" style="font-size:20px; color:#115978"></i>
                                Hackathon
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.calendardiscussion') }}" style="color:#115978">
                                    <i class="fa fa-calendar pr-1" aria-hidden="true" style="font-size:20px; color:#115978"></i>
                                    My Calender
                                    <span class="badge p-1 bg-light border text-dark rounded-pill align-text-bottom">27</span>
                                </a>
                            </li>
                        </ul>
                        @auth
                            <x-dashmenu />
                        @endauth
                        
                    </div>
                </nav>
                <main class="col-md-8 ms-sm-auto col-lg-10 px-md-0">
                    @yield('content')
                </main>
            </div>
            
        </div>
    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>


    <script>
        // function updateTextArea() {     
        //     var allVals = [];
        //     $('.taglist :checked').each(function(i) {
                    
        //         allVals.push((i!=0?"\r\n":"")+ $(this).val());
        //     });
        //     $('#video0_tags').val(allVals).attr('rows',allVals.length) ;
            
        // }
        // $(function() {
        //     $('.taglist input').click(updateTextArea);
        //     updateTextArea();
        // });


        // Group function  #############
        function updateGroup() {     
            var groups = [];
            $('.groupList :checked').each(function(i) {
                    
                groups.push((i!=0?"\r\n":"")+ $(this).val());
            });
            $('#groups').val(groups).attr('rows',groups.length) ;
            
        }
        $(function() {
            $('.groupList input').click(updateGroup);
            updateGroup();
        });


        // Group function  #############
        function updateTopic() {     
            var topics = [];
            $('.topicList :checked').each(function(i) {
                    
                topics.push((i!=0?"\r\n":"")+ $(this).val());
            });
            $('#topics').val(topics).attr('rows',topics.length) ;
            
        }
        $(function() {
            $('.topicList input').click(updateTopic);
            updateTopic();
        });



        // Start People function  #############
        function updatePeople() {     
            var peoples = [];
            $('.listofpeople :checked').each(function(i) {
                    
                peoples.push((i!=0?"\r\n":"")+ $(this).val());
            });
            $('#peoples').val(peoples).attr('rows',peoples.length) ;
            
        }
        $(function() {
            $('.listofpeople input').click(updatePeople);
            updatePeople();
        });
        // End People function  #############
    </script>


    
    
</body>
    
</html>