import { Product } from "./home"

const previews:NodeListOf<HTMLImageElement> = document.querySelectorAll(".img"),
    mainImg: HTMLImageElement | null = document.querySelector(".main-img"),
    shopCartp:HTMLDivElement | null = document.querySelector(".shop-cart-container"),
    closeCartp:HTMLImageElement | null = document.querySelector("#arrow-left"),
    shopCartBtnp: HTMLImageElement | null = document.querySelector("#shopCart"),
    itemp: HTMLDivElement | null = document.querySelector(".item"),
    buyBtn: HTMLLabelElement | null = document.querySelector("#product-label"),
    value:HTMLHeadingElement | null = document.querySelector("#value"),
    tittle: HTMLHeadingElement | null = document.querySelector("#tittle"),
    cod: HTMLParagraphElement | null = document.querySelector("#cod"),
    cover: HTMLImageElement | null = document.querySelector(".main-img")

console.log(value?.innerText)


window.addEventListener("load", ()=>{
    updateCart(itemp)
})
buyBtn?.addEventListener("click", ()=>{
   const product: Product ={
        cover: cover!.src,
        tittle: tittle!.innerHTML,
        value: Number(value!.innerText),
        unityValue: Number(value!.innerText),
        cod: cod!.innerHTML,
        qtd: 1

   } 
   let arrProducts: Product[] = []
    if(localStorage.getItem("cart")){
        arrProducts = JSON.parse(localStorage.getItem("cart") || "{}")
   
        if(!(arrProducts.find((ele)=> ele.tittle === product.tittle))){        
            arrProducts.push(product)
            localStorage.setItem("cart", JSON.stringify(arrProducts))
            updateCart(itemp)
        }
    }else{
        arrProducts.push(product)
        localStorage.setItem("cart", JSON.stringify(arrProducts))
        updateCart(itemp)
    }



})
previews.forEach((e)=>{
    e.addEventListener("click", ()=>{
        const path = mainImg!.src;
        mainImg!.src = e.src
        e.src = path
    })
})

shopCartBtnp?.addEventListener('click', ()=>{
    shopCartp?.classList.toggle("show")
})
closeCartp?.addEventListener('click', ()=>{
     shopCartp?.classList.toggle("show") 
})

function updateCart(div: HTMLDivElement | null){
    let count = 0;
    div!.innerHTML = ""
    let arrProducts: Product[] | null = []
    arrProducts = JSON.parse(localStorage.getItem("cart") || "{}")

    arrProducts?.forEach((e) =>{
        if(e.qtd > 0){

            div!.innerHTML += `
            <div class='item-show'>
                <img class="shop-cart-img"  src="${e.cover}" alt="">
                <div class="info">
                    <p id="tittle${count}" class="game-tittle-cart">${e.tittle}</p>
                    <div class="action-buttons">
                        <input id="${count}" class="action m" type="button" value="+">
                        <input class="action" type="button" value="${e.qtd}">
                        <input id="${count}" class="action l" type="button" value="-">
                    </div>
                </div>
            </div>`
            count++;
        }
        
    })
}