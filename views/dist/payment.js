"use strict";
const left = document.querySelector(".left"), middle = document.querySelector(".middle"), right = document.querySelector(".right"), itensContainer = document.querySelector(".items-cart-container"), cardLabels = document.querySelectorAll(".payment-methods > label"), totalValue = document.querySelector("#value");
window.addEventListener("load", () => {
    let arrProducts = [];
    arrProducts = JSON.parse(localStorage.getItem("cart") || '{}');
    let count = 0;
    arrProducts.forEach((e) => {
        if (e.qtd !== 0) {
            count += e.value;
            itensContainer.innerHTML += `
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
                </div>`;
        }
    });
    totalValue.innerText = "R$" + String(count);
});
cardLabels.forEach((e) => {
    e.addEventListener('click', () => {
        document.querySelectorAll(".payment-methods > label")
            .forEach((ele) => {
            ele.classList.remove("selected");
        });
        e.classList.toggle("selected");
    });
});
