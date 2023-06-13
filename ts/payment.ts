const left: HTMLDivElement | null = document.querySelector(".left"),
     middle: HTMLDivElement | null = document.querySelector(".middle"),
     right: HTMLDivElement | null = document.querySelector(".right"),
     itensContainer: HTMLDivElement | null = document.querySelector(".items-cart-container")

interface Product{
    cover: string,
    tittle: string,
    value: number,
    unityValue: number,
    qtd: number
}
window.addEventListener("load", ()=>{
    console.log(itensContainer)
    let arrProducts:Product[] = [] 
    arrProducts =  JSON.parse(localStorage.getItem("cart") || '{}') 
    console.log(arrProducts)

    arrProducts.forEach((e: Product)=>{
        itensContainer!.innerHTML += `
            <div class='items-cart'>
                <div>
                    <img class='product-img' src='${e.cover}'>
                    <div class='prod-info'>
                        <h3>${e.tittle}</h3>
                        <h3>R$${e.value}</h3>
                        <h4>${e.qtd}</h4>
                    </div>
                </div>
            </div>`
    })
})  