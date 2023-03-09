// import { useCardano } from '@cardano-foundation/cardano-connect-with-wallet';

document.querySelector('.connectwallet').addEventListener('click', function(){
    console.log(window.cardano.yoroi.enable());
    // document.querySelector('.connectwallet').innerHTML = "Disconnect";
});


// var status = document.getElementById("status");
// var button = document.getElementById("button");

// async function connectWallet(){
//     if(typeof window.cardano == 'undefined' || typeof window.cardano.nami == 'undefined') return alert('false');

//     window.cardano.nami.enable().then(api=>{
//         api.getUsedAddresses().then(addy=>{
//             alert(addy);
//         });
//     });

//     button.onclick=connectWallet;
// }
