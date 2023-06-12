"use strict";
const shopCartBtn = document.querySelector("#shopCart"), shopCart = document.querySelector(".shop-cart-container"), closeCart = document.querySelector("#arrow-left"), add = document.querySelectorAll(".add"), item = document.querySelector(".item");
window.addEventListener("load", () => {
    if (localStorage.getItem("cart")) {
        updateCart(item);
    }
});
shopCartBtn?.addEventListener('click', () => {
    shopCart?.classList.toggle("show");
});
closeCart?.addEventListener('click', () => {
    shopCart?.classList.toggle("show");
});
add.forEach((e) => {
    let arrProducts = [];
    e.addEventListener("click", () => {
        const cover = e.parentElement?.childNodes[1].childNodes[1], tittle = e.parentElement?.childNodes[3], value = e.parentElement?.childNodes[7].childNodes[1].childNodes[1].childNodes[3], unity = e.parentElement?.childNodes[7].childNodes[1].childNodes[1].childNodes[3];
        const product = {
            cover: cover.src,
            tittle: tittle.innerText,
            value: Number(value.innerText),
            unityValue: Number(unity.innerText)
        };
        if (localStorage.getItem("cart")) {
            arrProducts = JSON.parse(localStorage.getItem("cart") || '{}');
            arrProducts.push(product);
            localStorage.setItem("cart", JSON.stringify(arrProducts));
            shopCart?.classList.toggle("show");
            const timer = setTimeout(() => {
                shopCart?.classList.remove("show");
                clearTimeout(timer);
            }, 3000);
            updateCart(item);
        }
        else {
            updateCart(item);
            const timer = setTimeout(() => {
                shopCart?.classList.remove("show");
                clearTimeout(timer);
            }, 300);
            arrProducts.push(product);
            localStorage.setItem("cart", JSON.stringify(arrProducts));
        }
    });
});
function updateCart(div) {
    div.innerHTML = "";
    let arrProducts = [];
    arrProducts = JSON.parse(localStorage.getItem("cart") || "{}");
    arrProducts.forEach((e) => {
        div.innerHTML = `<img class="shop-cart-img"  src="${e.cover}" alt="">
        <div class="info">
            <p class="game-tittle-cart">${e.tittle}</p>
            <div class="action-buttons">
                <input class="action m" type="button" value="+">
                <input class="action" type="button" value="0">
                <input class="action l" type="button" value="-">
            </div>
        </div>`;
    });
}
