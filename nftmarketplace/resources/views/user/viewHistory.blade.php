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
    <link rel="stylesheet" href="{{ url('/assets/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/history.css') }}">
    <title>NFT | Ownership</title>
</head>

<body>

    <!-- Header -->
    <header>

        <div class="container">
            <div class="row menu">
                <div class="col-md-8 menu-left">
                    <div class="logo">
                        <img src="./assets/img/Logo.png" alt="">
                        <h1>SALT</h1>
                    </div>

                    <ul class="menu-right">
                        <li><a href="">News</a></li>
                        <li><a href="">Explore</a></li>
                        <li><a href="">Create NFT</a></li>
                        <li><a href="">Community</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <div class="setting">
                        <a href=""> <i class="ti ti-wallet"></i> Wallet Connect</a>
                        <a href=""> <i class="ti ti-shopping-cart"><sup>2</sup></i></a>
                        <a href=""> <i class="ti ti-bell"><sup>1</sup></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End header -->

    <!-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="ti ti-arrow-left">Back</i></h2>
            </div>
        </div>
    </div> -->
    <!-- Product History -->

    <section>
        {{-- <div class="container">
            <div class="row history">
                <div class="col-md-6 artwork">
                    <img src="./assets/img/artwork.jpg" alt="">
                </div>

                <div class="col-md-6 info-product">
                    <div class="form-group">
                        <div class="form-control">
                            <label for="contract-address">Contract Adress</label>
                            <input type="text" class="form-control" placeholder="0xx...">
                        </div>

                        <div class="form-control">
                            <label for="contract-address">Token ID</label>
                            <input type="text" class="form-control" placeholder="0xx...">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="container">
            <div class="row">
                <div class="col-md-12 metadata">
                    <h1>Metadata</h1>
                    <h4>Name: {{ $metadata[0]->name }}</h4>
                    <h4>IPFS: {{$metadata[0]->ipfs}}</h4>
                    <h4>MediaType: {{$metadata[0]->mediaType}} </h4>
                    <h4>Artist: {{$metadata[0]->artist}} </h4>
                    <h4>Created Date: {{$metadata[0]->created_at}} </h4>



                </div>
            </div>
        </div>




        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row title-product">
                        <div class="col-md-12">
                            <h1 class="title-history">History</h1>
                        </div>
                    </div>


                    <?php
                    $i = 0;
                    
                    // $j = 0;
                    
                    ?>
                        <?php
                        // foreach ($reciever as $item) {
                        //     if (empty($item[0])) {
                        //         echo 'true';
                        //     }
                        //     if (!empty($item[0])) {
                        //         echo 'false';
                        //         echo '</br>';
                        //         echo $item[0]->name;
                        //     }
                        //     }
                            
                            // dd("."); 
                            
                            // $j = 0;
                            
                            ?>
                            @foreach ($transactions as $transaction)    

                        <div class="row history-detail">
                            <div class="col-md-9">
                                <div class="NFT">
                                    {{-- <img src="https://demothemesflat.com/axies/assets/images/avatar/avt-2.jpg"
                                        alt=""> --}}
                                </div>

                                <div class="transaction">
                                    <h2 class="buyer">{{ $sender[$i][0]->name }}</h2>
                                    @if (empty($reciever[$i][0]))
                                        <h3 class="seller">minted NFT</h3>
                                    @else
                                        <h3 class="seller">sold out {{ $reciever[$i][0]->name }}</h3>
                                    @endif
                                    <p class="timer">{{ $transaction->created_at }}</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <h3 >{{$transaction->total_price}} ADA</h3>
                            </div>
                        </div>

                        <?php
                        $i++;
                        ?>
                    @endforeach

                </div>

                <div class="col-md-4">
                    <div class="row product">
                        <div class="avatar">
                            <img src="{{ asset('storage/' .$nft->feature_image_path.'/'.$nft->feature_image_name)}}" class="card-img-top" alt="">

                        </div>
                    </div>

                </div>
            </div>



        </div>
    </section>

</body>

</html>
