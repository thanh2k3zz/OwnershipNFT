<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://thumb.ac-illust.com/3e/3ed2e08c4f16e867d7129ee87fd320a8_t.jpeg" type="image/gif" sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="{{url('assets/css/detailTransaction.css')}}">
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
            <div class="row">
                <div class="col-md-12 view-details">
                    <table class="table">
                        <h1>View detail</h1>
                        <tbody>
                            <tr>
                                <td>Tx Hash</td>
                                <td>{{ $view_detail->hash }}</td>
                            </tr>
                            <tr>
                                <td style="color: #fff; border-bottom: none;">Inputs:</td>
                            </tr>
                            @foreach ($view_detail->inputs as $item)
                                
                            <tr>
                                <td>Address from</td>
                                <td>{{ $item->address }}</td>
                            </tr>

                            <tr>
                                <td>Amount</td>
                                <td>{{ number_format($item->amount[0]->quantity/1000000) }} ADA</td>
                            </tr>


                            @endforeach
                            <?php
                                $totalOutput = 0;
                            ?>  

                            <tr>
                                <td style="color: #fff; border-bottom: none;">Outputs:</td>
                            </tr>
                            @foreach ($view_detail->outputs as $item)
                            <tr>
                                
                                <td>Address to</td>
                                <td>{{ $item->address }}</td>
                            </tr>

                            <tr>
                                <td>Amount</td>
                                <td>{{ number_format($item->amount[0]->quantity/1000000) }} ADA</td>
                            </tr>

                            <?php
                                $totalOutput += $item->amount[0]->quantity/1000000;
                                
                            ?>  


                            @endforeach

                            <tr>
                                <td style="color: #fff; border-bottom: none;">Total Output</td>
                                <td style="color: #fff; border-bottom: none;">{{$totalOutput}} ADA</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


</body>
</html>