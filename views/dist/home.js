"use strict";
const shopCartBtn = document.querySelector("#shopCart"), shopCart = document.querySelector(".shop-cart-container"), closeCart = document.querySelector("#arrow-left"), add = document.querySelectorAll(".add"), item = document.querySelector(".item"), carrousel = document.querySelector(".img-carrousel"), covers = document.querySelectorAll(".i");
window.addEventListener("load", () => {
    let c = 0;
    if (localStorage.getItem("cart")) {
        updateCart(item);
    }
    setInterval(() => {
        c += 70;
        carrousel.style.transform = `translate(-${c}rem)`;
        carrousel.style.transition = "2s ease";
        if (c === (covers.length * 70)) {
            c = 0;
            carrousel.style.transform = `translate(0%)`;
            carrousel.style.transition = "2s ease";
        }
    }, 1 * 100 * 30);
    addAndDecrease();
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
        shopCart?.classList.toggle("show");
        const timer = setTimeout(() => {
            shopCart?.classList.remove("show");
            clearTimeout(timer);
        }, 3000);
        const cover = e.parentElement?.childNodes[1].childNodes[1], tittle = e.parentElement?.childNodes[3], value = e.parentElement?.childNodes[7].childNodes[1].childNodes[1].childNodes[3], unity = e.parentElement?.childNodes[7].childNodes[1].childNodes[1].childNodes[3];
        const product = {
            cover: cover.src,
            tittle: tittle.innerText,
            value: Number(value.innerText),
            unityValue: Number(unity.innerText),
            qtd: 1
        };
        if (localStorage.getItem("cart")) {
            arrProducts = JSON.parse(localStorage.getItem("cart") || '{}');
            if (!(arrProducts.find((e) => e.tittle == product.tittle))) {
                arrProducts.push(product);
                localStorage.setItem("cart", JSON.stringify(arrProducts));
                updateCart(item);
            }
        }
        else {
            arrProducts.push(product);
            localStorage.setItem("cart", JSON.stringify(arrProducts));
            updateCart(item);
        }
        addAndDecrease();
    });
});
function updateCart(div) {
    let count = 0;
    div.innerHTML = "";
    let arrProducts = [];
    arrProducts = JSON.parse(localStorage.getItem("cart") || "{}");
    arrProducts.forEach((e) => {
        div.innerHTML += `
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
        </div>`;
        count++;
    });
}
function updateLs(productName, button) {
    let arr = [];
    arr = JSON.parse(localStorage.getItem("cart") || '{}');
    arr.map((e) => {
        if (e.tittle == productName) {
            if (button.classList.contains("m")) {
                e.qtd += 1;
                e.value += e.unityValue;
            }
            else {
                e.value -= e.unityValue;
                e.qtd -= 1;
            }
        }
    });
    localStorage.setItem("cart", JSON.stringify(arr));
}
function addAndDecrease() {
    const actionBtns = document.querySelectorAll(".action");
    actionBtns.forEach((e) => {
        const qtd = e.parentElement?.childNodes[3];
        const name = document.querySelector(("#tittle" + e.id));
        e.addEventListener('click', () => {
            if (e.classList.contains("m")) {
                qtd.value = Number(qtd.value) + 1;
                updateLs(name.innerHTML, e);
            }
            else if (e.classList.contains("l")) {
                if (qtd.value != 0) {
                    qtd.value = Number(qtd.value) - 1;
                    updateLs(name.innerHTML, e);
                }
            }
        });
    });
}
