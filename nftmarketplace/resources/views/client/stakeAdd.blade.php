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
                        <li><a href="{{url("http://localhost:3000")}}">Create NFT</a></li>
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
                        <div class="col-md-3 asset-item">
                            {{-- <a href=""> --}}

                                @if (!empty($item->onchain_metadata))
                                    <?php
                                    echo '<img src="https://ipfs.io/ipfs/' . htmlspecialchars(str_replace('ipfs:/', '',$item->onchain_metadata->image)) . '" />';
                                    // echo '<video controls="" autoplay="" name="media">
                                    //     <source src="https://ipfs.io/ipfs/' . htmlspecialchars(str_replace('ipfs:/', '',$item->onchain_metadata->image)) . '" type="audio/mpeg">
                                    // </video>';
                                    // <video controls="" autoplay="" name="media">
                                    //     <source src="https://ipfs.io/ipfs/' . htmlspecialchars(str_replace('ipfs:/', '',$item->onchain_metadata->image)) . '" type="audio/mpeg">
                                    // </video>
                                    ?>
                                
                                <h4>{{$item->onchain_metadata->name}}</h4>
                                    
                                    

                                    <div class="buttonProduct">
                                        <svg class="h-3 w-3 text-sm font-medium text-red-500" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 40" version="1.1" fill="currentColor" width="22" height="24"><path style="fill-rule: evenodd; stroke-width: 1.45536" d="M 15.4375 -0.10546875 L 9.1875 15.783203 L 0.015625 15.783203 L 0.015625 20.822266 L 7.2070312 20.822266 L 5.53125 25.083984 L 0.015625 25.083984 L 0.015625 30.123047 L 3.5488281 30.123047 L 0.015625 39.105469 L 5.0976562 39.105469 L 8.6386719 30.123047 L 27.353516 30.123047 L 30.894531 39.105469 L 35.976562 39.105469 L 32.443359 30.123047 L 35.976562 30.123047 L 35.976562 25.083984 L 30.460938 25.083984 L 28.785156 20.822266 L 35.976562 20.822266 L 35.976562 15.783203 L 26.804688 15.783203 L 20.554688 -0.10546875 L 15.4375 -0.10546875 z M 17.996094 6.3847656 L 21.701172 15.783203 L 14.291016 15.783203 L 17.996094 6.3847656 z M 12.304688 20.822266 L 23.6875 20.822266 L 25.367188 25.083984 L 10.625 25.083984 L 12.304688 20.822266 z "></path></svg>
                                        <div class="status-button">
                                            <a class="history" href="">History</a>
                                            <a class="detail" href="">Detail</a>
                                        </div>
                                    </div>
                                @else
                                    <img src="{{asset('/assets/img/anhloihienthi.png')}}"
                                        alt="">
                                <h4>Name error</h4>

                                
                                <div class="buttonProduct">
                                    <svg class="h-3 w-3 text-sm font-medium text-red-500" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 40" version="1.1" fill="currentColor" width="22" height="24"><path style="fill-rule: evenodd; stroke-width: 1.45536" d="M 15.4375 -0.10546875 L 9.1875 15.783203 L 0.015625 15.783203 L 0.015625 20.822266 L 7.2070312 20.822266 L 5.53125 25.083984 L 0.015625 25.083984 L 0.015625 30.123047 L 3.5488281 30.123047 L 0.015625 39.105469 L 5.0976562 39.105469 L 8.6386719 30.123047 L 27.353516 30.123047 L 30.894531 39.105469 L 35.976562 39.105469 L 32.443359 30.123047 L 35.976562 30.123047 L 35.976562 25.083984 L 30.460938 25.083984 L 28.785156 20.822266 L 35.976562 20.822266 L 35.976562 15.783203 L 26.804688 15.783203 L 20.554688 -0.10546875 L 15.4375 -0.10546875 z M 17.996094 6.3847656 L 21.701172 15.783203 L 14.291016 15.783203 L 17.996094 6.3847656 z M 12.304688 20.822266 L 23.6875 20.822266 L 25.367188 25.083984 L 10.625 25.083984 L 12.304688 20.822266 z "></path></svg>
                                    <div class="status-button">
                                        <a class="history" href="">History</a>
                                        <a class="detail" href="">Detail</a>
                                    </div>
                                </div>
                                @endif
                            {{-- </a> --}}
                        </div>
                    @endforeach

                </div>
            @endif
        </div>
    </section>


</body>

</html>
