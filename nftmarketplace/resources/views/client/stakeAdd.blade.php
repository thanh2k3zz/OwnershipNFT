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
    <link rel="stylesheet" href="{{ url('assets/css/stakeAdd.css') }}">

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
                        <a class="connectwallet" href=""> <i class="ti ti-wallet"></i> Wallet Connect</a>
                        <a href=""> <i class="ti ti-shopping-cart"><sup>2</sup></i></a>
                        <a href=""> <i class="ti ti-bell"><sup>1</sup></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 block-search">
                    <form action="{{ url('/result-query-stake') }}" method="get">
                        <div class="search">
                            <h1>Cardano Ecosystem</h1>
                            <img src="{{ asset('/assets/img/logocardano.jpg') }}" alt="">
                            <input name="stake_address" type="text" placeholder="Enter your stake address">
                            <p>Query all assets in your wallet.</p>
                            <button class="">Query Assets</button>
                        </div>
                    </form>
                </div>
            </div>


            @if (!empty($asset))


                <div style="margin-top: 50px" class="row product-item">

                    @foreach ($asset as $item)
                        <div class="col-md-3">
                            <a href="">

                                <?php
                                echo '<img src="https://ipfs.io/ipfs/' . htmlspecialchars(str_replace('ipfs:/', '',$item->onchain_metadata->image)) . '" />';
                                ?>
                                <h4>{{ $item->onchain_metadata->name }}</h4>
                                <div style="justify-content: start;" class="ownedBy">
                                    <a href="" class="user">
                                        <img src="https://demothemesflat.com/axies/assets/images/avatar/avt-1.jpg"
                                            alt="">
                                        <div class="descUser">
                                            <p class="posUser">Owner By</p>
                                            <p class="nameUser">{{ $item->onchain_metadata->artist }}</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="buttonProduct">
                                    <a href="">Buy Now</a>
                                    <a href="{{url("/result-search?key1={$item->asset_name}&key2={$item->policy_id}")}}">View History</a>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            @endif
        </div>
    </section>


</body>

</html>
