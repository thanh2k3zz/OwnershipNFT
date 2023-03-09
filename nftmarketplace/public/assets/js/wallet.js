

document.querySelector('.connectwallet').addEventListener('click', function(){
    console.log(window.cardano.yoroi.enable());
    // if(window.cardano.yoroi == 'undefined'){
    // document.querySelector('.connectwallet').innerHTML = "Wallet Connect";
    // }else{   

    //     document.querySelector('.connectwallet').innerHTML = "Disconnect";
    // }
    // alert('Hi');
});