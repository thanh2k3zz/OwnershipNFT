p
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
    <link rel="stylesheet" href="{{ url('/assets/css/nftinfo.css') }}">

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
                        <li><a href="{{ url('http://localhost:3000') }}">Create NFT</a></li>
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
        <div class="container">
            <div class="row history">
                <div class="col-md-6 artwork">
                    <img src="./assets/img/artwork.jpg" alt="">
                </div>

                <div class="col-md-6 info-product">
                    <div class="form-group">
                        <form action="{{ url('/result-search') }}" method="get" class="form-inline">
                            <div class="form-control">
                                <label for="contract-address">Asset Name</label>
                                <input type="text" class="form-control " name="key1" placeholder="0xx...">
                            </div>

                            <div class="form-control">
                                <label for="contract-address">Policy ID</label>
                                <input type="text" class="form-control" name="key2" placeholder="0xx...">
                            </div>
                            <button class="btn btn-primary">
                                View history
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        {{-- Result NFT --}}


        @if (!empty($transactions) && !empty($NFT))

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
                                    <td>Media Type</td>
                                    <td>{{ $NFT->onchain_metadata->mediaType }}</td>
                                </tr>

                                <tr>
                                    <td>Date Minted</td>
                                    <td>{{ gmdate('r', $NFTtsx->block_time) }}</td>
                                </tr>

                                {{-- <tr>
                                    <td>Last Owner</td>
                                    <td>
                                        <p>
                                            {{ $data[0]['payment_address'] }}
                                        </p>
                                        
                                    </td>
                                </tr> --}}

                                {{-- <tr>
                                    <td>Ownership transfers</td>
                                    <td>
                                        @foreach ($assetSummary as $itemOut)
                                            {{$itemOut['total_transactions']}}
                                        @endforeach
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>

                    </div>

                    <div class="col-md-4 nft">
                        <?php

                        if($NFT->onchain_metadata->mediaType == 'image/png' 
                        || $NFT->onchain_metadata->mediaType == 'image/jpeg'
                        || $NFT->onchain_metadata->mediaType == 'image/gif'
                        || $NFT->onchain_metadata->mediaType == 'image/svg+xml'
                        ){
                            echo '<img class="imgNFT" src="https://ipfs.io/ipfs/' . htmlspecialchars(str_replace('ipfs:/', '', $NFT->onchain_metadata->image)) . '" />';

                        }else if(
                            $NFT->onchain_metadata->mediaType == 'video/mp4'
                            || $NFT->onchain_metadata->mediaType == 'video/quicktime'
                            || $NFT->onchain_metadata->mediaType == 'video/x-msvideo'
                            || $NFT->onchain_metadata->mediaType == 'video/x-matroska'
                        ){
                            echo '<video controls="" autoplay="" name="media">
                                    <source src="https://ipfs.io/ipfs/QmRXKAWxrQm8Xyv2BDsDvmXbEUVEapwUWkyDi9j6Qv3pU6" type="video/mp4">
                                </video>';
                        }

                        else if(
                            $NFT->onchain_metadata->mediaType == 'audio/ogg'
                            || $NFT->onchain_metadata->mediaType == 'audio/aac'
                            || $NFT->onchain_metadata->mediaType == 'audio/wav'
                            || $NFT->onchain_metadata->mediaType == 'audio/mpeg'
                        ){
                            echo '<video controls="" autoplay="" name="media">
                                    <source src="https://ipfs.io/ipfs' . htmlspecialchars(str_replace('ipfs:/', '', $NFT->onchain_metadata->image)) . '" type="audio/mpeg">
                                </video>';
                        }

                        else if(
                            $NFT->onchain_metadata->mediaType == 'text/csv'
                            || $NFT->onchain_metadata->mediaType == 'text/markdown'
                            || $NFT->onchain_metadata->mediaType == 'text/html'
                            || $NFT->onchain_metadata->mediaType == 'text/plain'
                        ){
                            echo '<iframe src="https://ipfs.io/ipfs' . htmlspecialchars(str_replace('ipfs:/', '', $NFT->onchain_metadata->image)) . '"></iframe>';
                        }
                        
                        ?>
                    </div>
                </div>
            </div>





            <div class="container">
                <div class="row">
                    <div class="col-md-12 history">
                        <h1>Ownership transfers NFT </h1>
                        <p>Each NFT transaction on Cardano will be recorded on Cardano's blockchain, along with relevant
                            information such as the sender and recipient's wallet addresses, the number of NFTs
                            transacted, and the transaction's hash.
                        </p>

                        @foreach ($transactions as $transaction)
                            <div class="block-history">
                                <form action="{{ url('/view-detail-nft') }}" method="GET">
                                    <p style="font-style: italic;"> {{ gmdate('r', $transaction->block_time) }}</p>
                                    <p>
                                        Tx hash:
                                        <input type="text" name="tx_hash" value="{{ $transaction->tx_hash }}">
                                    </p>

                                    {{-- <p>Block height: {{ $transaction->block_height }}</p> --}}
                                    {{-- <div class="button"> --}}

                                    <button class="btn btn-primary">View detail</button>
                                    {{-- </div> --}}
                                </form>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>

        @endif
    </section>





    <script src="{{ url('assets/js/test.js') }}"></script>
</body>

</html>
