"use strict";
const left = document.querySelector(".left"), middle = document.querySelector(".middle"), right = document.querySelector(".right"), itensContainer = document.querySelector(".items-cart-container");
window.addEventListener("load", () => {
    console.log(itensContainer);
    let arrProducts = [];
    arrProducts = JSON.parse(localStorage.getItem("cart") || '{}');
    console.log(arrProducts);
    arrProducts.forEach((e) => {
        itensContainer.innerHTML += `
            <div class='items-cart'>
                <div>
                    <img class='product-img' src='${e.cover}'>
                    <div class='prod-info'>
                        <h3>${e.tittle}</h3>
                        <h3>R$${e.value}</h3>
                        <h4>${e.qtd}</h4>
                    </div>
                </div>
            </div>`;
    });
});
