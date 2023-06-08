<header>

    <div class="container">
        <div class="row menu">
            <div class="col-md-8 menu-left">
                <div class="logo">
                    <img src="./assets/img/Logo.png" alt="">
                    <h1>SALT</h1>
                </div>

                <ul class="menu-right">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url("/search")}}">Search</a></li>
                        <li><a href="{{url("http://localhost:3000/createNFT")}}">Create NFT</a></li>
                        <li><a href="{{url("/track")}}">Track</a></li>
                        <li><a href="{{url("/query-all-nft")}}">Check Assets</a></li>
                </ul>
            </div>
            
            <div class="col-md-4">
                <div class="setting">
                    {{-- <a class="connectwallet" href=""> <i class="ti ti-wallet"></i> Wallet Connect</a> --}}
                    <a href=""> <i class="ti ti-shopping-cart"><sup>2</sup></i></a>
                    <a href=""> <i class="ti ti-bell"><sup>1</sup></i></a>
                </div>
            </div>
        </div>
    </div>
</header>