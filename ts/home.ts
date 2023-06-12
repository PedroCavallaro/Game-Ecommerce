
const shopCartBtn: HTMLImageElement | null = document.querySelector("#shopCart"),
    shopCart:HTMLDivElement | null = document.querySelector(".shop-cart-container"),
    closeCart:HTMLImageElement | null = document.querySelector("#arrow-left"),
    add: NodeListOf<HTMLImageElement> = document.querySelectorAll(".add"),
    item: HTMLDivElement | null = document.querySelector(".item"),
    carrousel:HTMLDivElement | null = document.querySelector(".img-carrousel"),
    covers:NodeListOf<HTMLImageElement> = document.querySelectorAll(".i")
    
let c = 0;
interface Product{
    cover: string,
    tittle: string,
    value: number,
    unityValue: number,
}
window.addEventListener("load", ()=>{
    if(localStorage.getItem("cart")){
        updateCart(item);
    }
    setInterval(()=>{
        c+= 50;
        carrousel!.style.transform = `translate(-${c}%)`
        carrousel!.style.transition = "2s ease"
        if(c === (covers.length * 50)){
            c = 0
            carrousel!.style.transform = `translate(0%)`
            carrousel!.style.transition = "2s ease"
        }
    }, 1 * 100 * 30)
})
shopCartBtn?.addEventListener('click', ()=>{    
    shopCart?.classList.toggle("show")
})
closeCart?.addEventListener('click', ()=>{
    shopCart?.classList.toggle("show")
   
})

add.forEach((e)=>{
    let arrProducts: Product[] = []
    e.addEventListener("click", ()=>{
        const cover:any = e.parentElement?.childNodes[1].childNodes[1] ,
            tittle:any= e.parentElement?.childNodes[3],
            value: any = e.parentElement?.childNodes[7].childNodes[1].childNodes[1].childNodes[3],
            unity: any = e.parentElement?.childNodes[7].childNodes[1].childNodes[1].childNodes[3]
        
        const product : Product ={
            cover: cover.src,
            tittle: tittle.innerText,
            value: Number(value.innerText),
            unityValue: Number(unity.innerText)
        }
        if(localStorage.getItem("cart")){
            arrProducts = JSON.parse(localStorage.getItem("cart") || '{}')  
            arrProducts.push(product)
            localStorage.setItem("cart", JSON.stringify(arrProducts))
            shopCart?.classList.toggle("show")
           
            const timer = setTimeout(() => {
                shopCart?.classList.remove("show")
                clearTimeout(timer)
                    }, 3000);
            updateCart(item)

        }else{
            updateCart(item)
           const timer =setTimeout(() => {
               shopCart?.classList.remove("show")
                clearTimeout(timer)
                }, 300);
            arrProducts.push(product)
            localStorage.setItem("cart", JSON.stringify(arrProducts))
       

        }
    })
})
function updateCart(div: HTMLDivElement | null){
    div!.innerHTML = ""
    let arrProducts: Product[] = []
    arrProducts =  JSON.parse(localStorage.getItem("cart") || "{}")

    arrProducts.forEach((e) =>{
        div!.innerHTML = `<img class="shop-cart-img"  src="${e.cover}" alt="">
        <div class="info">
            <p class="game-tittle-cart">${e.tittle}</p>
            <div class="action-buttons">
                <input class="action m" type="button" value="+">
                <input class="action" type="button" value="0">
                <input class="action l" type="button" value="-">
            </div>
        </div>`
    })


}