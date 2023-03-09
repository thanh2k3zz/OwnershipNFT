const nami_lib = await import('nami-wallet-api')
const nami = await nami_lib.NamiWalletApi(
    window.cardano, //nami wallet object
    "mainnettClW67e7zjxBTdjgynNwmGsvyz5DCMmC"
)

// The library runs with the pure js 
// https://www.npmjs.com/package/@emurgo/cardano-serialization-lib-asmjs
// but its super slow



//React example

useEffect(() => {
  async function t(){
    const nami_lib = await import('nami-wallet-api')
    const Nami = await nami_lib.NamiWalletApi(
        window.cardano,
        "mainnettClW67e7zjxBTdjgynNwmGsvyz5DCMmC"
    )
    let addr = await Nami.getAddress()
    console.log(addr)
  }
  
  t()
}, [])






// Setup the wasm lib to get 100x performance
// https://www.npmjs.com/package/@emurgo/cardano-serialization-lib-browser

const WASM_lib = await import('@emurgo/cardano-serialization-lib-browser/ cardano_serialization_lib')
const Nami = await nami_lib.NamiWalletApi(
    window.cardano,
    "mainnettClW67e7zjxBTdjgynNwmGsvyz5DCMmC",
    WASM_lib
)


let address = await Nami.getAddress()
console.log(address);