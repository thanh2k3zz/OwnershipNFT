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
    @stack('utxos')
    <title>NFT | Ownership</title>
</head>

<body>

    @include('layouts.app._header')


    <section>

        <div class="container specific-tst">
            <h4>Detail Transaction</h4>
            <div class="row block-item">
                <div class="col-md-6 info-item">
                    <ul>
                        <li>
                            <h5>Transaction Hash</h5>
                            <p>{{$view_detail_tst->hash}}</p>
                        </li>

                        <li>
                            <h5>Block</h5>
                            <p>{{$view_detail_tst->block_height}}</p>
                        </li>

                        <li>
                            <h5>Slot</h5>
                            <p>{{$view_detail_tst->slot}}</p>
                        </li>

                        <li>
                            <h5>Deposit</h5>
                            <p>{{$view_detail_tst->deposit}}</p>
                        </li>
                    </ul>
                </div>


                <div class="col-md-6 info-item">
                    <ul>
                        <li>
                            <h5>Timestamp</h5>
                            <p>{{gmdate('r', $view_detail_tst->block_time )}}</p>
                        </li>

                        <li>
                            <h5>Total Fees</h5>
                            <p>{{($view_detail_tst->fees)/1000000}} ADA</p>
                        </li>

                        <li>
                            <h5>Total Outputs</h5>
                            <p>143.2</p>
                        </li>

                        <li>
                            <h5>Size</h5>
                            <p>{{$view_detail_tst->size}}</p>
                        </li>
                    </ul>
                </div>



            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 info-tst">
                    <div class="menu-bar">
                        <ul>

                            <li><button href="{{url('/view-detail-nft')}}">Summary</button></li>
                            {{-- <form action="{{url("/detail-tst/utxos/{$view_detail_tst->hash}")}}" method="get"> --}}
                            <form action="{{url("/mainnet-detail-tst/utxos/{$view_detail_tst->hash}")}}" method="get">
                                <li><button type="submit">UTXO</button></li>
                            </form>
                            <form action="{{url("/detail-tst/utxos/{$view_detail_tst->hash}")}}" method="get">
                                <li><button type="submit">Contracts</button></li>
                            </form>
                            <form action="{{url("/detail-tst/utxos/{$view_detail_tst->hash}")}}" method="get">
                                <li><button type="submit">Collateral</button></li>
                            </form>
                            <form action="{{url("/detail-tst/utxos/{$view_detail_tst->hash}")}}" method="get">
                                <li><button type="submit">Metadata</button></li>
                            </form>
                            
                        </ul>
                    </div>
                </div>
            </div>
        
            {{-- <div class="container">
                <div class="row block-item">
                    <div class="col-md-6 info-item">
                        <h4>From Address (Inputs)</h4>
                        <ul>
                            <li>
                                <h5>Address</h5>
                                <p>addrdvwjvnwdkvnwkvwkrkvr</p>
                            </li>
    
                            <li>
                                <h5>Address</h5>
                                <p>addrdvwjvnwdkvnwkvwkrkvr</p>
                            </li>
    
                            <li>
                                <h5>Address</h5>
                                <p>addrdvwjvnwdkvnwkvwkrkvr</p>
                            </li>
                        </ul>
                    </div>
    
    
                    <div class="col-md-6 info-item">
                        <h4>To Address (Outputs)</h4>
                        <ul>
                            <li>
                                <h5>Address</h5>
                                <p>addrdvwjvnwdkvnwkvwkrkvr</p>
                            </li>
    
                            <li>
                                <h5>Address</h5>
                                <p>addrdvwjvnwdkvnwkvwkrkvr</p>
                            </li>
    
                            <li>
                                <h5>Address</h5>
                                <p>addrdvwjvnwdkvnwkvwkrkvr</p>
                            </li>
                        </ul>
                    </div>
    
    
    
                </div>
        </div> --}}

        @yield('content')
        
        </div>




    </section>


</body>

</html>
