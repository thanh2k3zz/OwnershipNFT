<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://thumb.ac-illust.com/3e/3ed2e08c4f16e867d7129ee87fd320a8_t.jpeg" type="image/gif"
        sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    {{-- <link rel="stylesheet" href="{{url('/assets/css/nftinfo.css')}}"> --}}
   
    <title>NFT | Ownership</title>
</head>

<body>

    <header id="header">

        <div class="container">
            <div class="row menu">
                <div class="col-md-3 logo-block">
                    <div class="logo">
                        <img src="./assets/img/ownft.jpg" alt="">
                    </div>
                </div>
                
                <div id="menu-block" class="col-md-9 menu-block">
                    <ul class="menu-right-1">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url("/search")}}">Search</a></li>
                        <li><a href="{{url("#!")}}">Create</a></li>
                        <li><a href="{{url("/track")}}">Track</a></li>
                        <li><a href="{{url("/query-all-nft")}}">Assets</a></li>
                    </ul>
                    <ul onclick="showMenuCollapse()" class="menu-right-2">
                        <li>
                            <a href="#!"><i class="ti-menu"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section id="menu-collapse-block" class="menu-collapse-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="menu-collapse">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url("/search")}}">Search</a></li>
                        <li><a href="{{url("http://localhost:3000/createNFT")}}">Create</a></li>
                        <li><a href="{{url("/track")}}">Track</a></li>
                        <li><a href="{{url("/query-all-nft")}}">Assets</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

    <div id="content" class="container">
    </div>


    <div class="coming-soon">
        Coming Soon...
    </div>
    <!-- Footer -->


    <script src="{{url('/assets/js/main.js')}}"></script>

</body>

</html>
