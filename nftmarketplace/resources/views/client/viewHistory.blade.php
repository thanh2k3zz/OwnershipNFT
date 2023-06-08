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
    <link rel="stylesheet" href="{{ url('assets/css/nftinfo.css') }}">
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
                        {{-- <a href=""> <i class="ti ti-wallet"></i> Wallet Connect</a> --}}
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
                <div class="col-md-8 info">
                    <h1>NFT Information</h1>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Asset Name</td>
                                <td>{{ $NFT->asset_name }}</td>
                            </tr>
                            <tr>
                                <td>Policy ID</td>
                                <td>{{ $NFT->policy_id }}</td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>{{ $NFT->quantity }}</td>
                            </tr>
                            <tr>
                                <td>Tx Hash</td>
                                <td>{{ $NFT->initial_mint_tx_hash }}</td>
                            </tr>

                            <tr>
                                <td>Name</td>
                                <td>{{ $NFT->onchain_metadata->name }}</td>
                            </tr>

                            <tr>
                                <td>Image</td>
                                <td>{{ $NFT->onchain_metadata->image }}</td>
                            </tr>

                           

                            <tr>
                                <td>MediaType</td>
                                <td>{{ $NFT->onchain_metadata->mediaType }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <div class="col-md-4 nft">
                    <img src="https://ipfs.io/ipfs/' . <?php htmlspecialchars(str_replace('ipfs:/', '',$NFT->onchain_metadata->image))?> . '0"  />
                </div>
            </div>
        </div>





        <div class="container">
            <div class="row">
                <div class="col-md-12 history">
                    <h1>History</h1>

                @foreach ($transactions as $transaction)
                    
                    <div class="block-history">
                        <form action="{{ url('/view-detail-nft') }}" method="GET">
                            <p>Block time: {{$transaction->block_time}}</p>
                            <p>
                                Tx hash: 
                                <input type="text" name="tx_hash" value="{{$transaction->tx_hash}}"> 
                            </p>

                            <p>Block height: {{$transaction->block_height}}</p>
                            {{-- <div class="button"> --}}
                                
                                <button class="btn btn-warning">View detail</button>
                                {{-- </div> --}}
                            </form>
                    </div>
                @endforeach
                </div>


            </div>
        </div>


    </section>

</body>

</html>
