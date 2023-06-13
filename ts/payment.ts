const left: HTMLDivElement | null = document.querySelector(".left"),
     middle: HTMLDivElement | null = document.querySelector(".middle"),
     right: HTMLDivElement | null = document.querySelector(".right"),
     itensContainer: HTMLDivElement | null = document.querySelector(".items-cart-container"),
     cardLabels: NodeListOf<HTMLLabelElement> = document.querySelectorAll(".payment-methods > label"),
     totalValue: HTMLHeadingElement | null = document.querySelector("#value")

interface Product{
    cover: string,
    tittle: string,
    value: number,
    unityValue: number,
    qtd: number
}
window.addEventListener("load", ()=>{
    let arrProducts:Product[] = [] 
    arrProducts =  JSON.parse(localStorage.getItem("cart") || '{}') 

    let count = 0

    arrProducts.forEach((e: Product)=>{
        if(e.qtd !== 0){
            count += e.value;
            itensContainer!.innerHTML += `
                <div class='items-cart'>
                    <div>
                        <img class='product-img' src='${e.cover}'>
                        <div class='prod-info'>
                            <h4>${e.tittle}</h4>
                            <div>
                                <p>${e.qtd}x</p>
                                <p>R$${e.value}</p>
                            </div>
                        </div>
                    </div>
                </div>`
        }
    })
    totalValue!.innerText = "R$" + String(count)
})  
cardLabels.forEach((e) => {
    e.addEventListener('click', ()=>{

        document.querySelectorAll(".payment-methods > label")
        .forEach((ele)=>{
            ele.classList.remove("selected")
        })
        e.classList.toggle("selected")
    })
})
