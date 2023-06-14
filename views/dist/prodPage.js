const previews = document.querySelectorAll(".img"), mainImg = document.querySelector(".main-img"), shopCartp = document.querySelector(".shop-cart-container"), closeCartp = document.querySelector("#arrow-left"), shopCartBtnp = document.querySelector("#shopCart"), itemp = document.querySelector(".item"), buyBtn = document.querySelector("#product-label"), value = document.querySelector("#value"), tittle = document.querySelector("#tittle"), cod = document.querySelector("#cod"), cover = document.querySelector(".main-img");
window.addEventListener("load", () => {
    updateCart(itemp);
});
buyBtn?.addEventListener("click", () => {
    const product = {
        cover: cover.src,
        tittle: tittle.innerHTML,
        value: Number(value.innerText),
        unityValue: Number(value.innerText),
        cod: cod.innerHTML,
        qtd: 1
    };
    let arrProducts = [];
    if (localStorage.getItem("cart")) {
        arrProducts = JSON.parse(localStorage.getItem("cart") || "{}");
        if (!(arrProducts.find((ele) => ele.tittle === product.tittle))) {
            arrProducts.push(product);
            localStorage.setItem("cart", JSON.stringify(arrProducts));
            updateCart(itemp);
        }
    }
    else {
        arrProducts.push(product);
        localStorage.setItem("cart", JSON.stringify(arrProducts));
        updateCart(itemp);
    }
});
previews.forEach((e) => {
    e.addEventListener("click", () => {
        const path = mainImg.src;
        mainImg.src = e.src;
        e.src = path;
    });
});
shopCartBtnp?.addEventListener('click', () => {
    shopCartp?.classList.toggle("show");
});
closeCartp?.addEventListener('click', () => {
    shopCartp?.classList.toggle("show");
});
function updateCart(div) {
    let count = 0;
    div.innerHTML = "";
    let arrProducts = [];
    arrProducts = JSON.parse(localStorage.getItem("cart") || "{}");
    arrProducts?.forEach((e) => {
        if (e.qtd > 0) {
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
        }
    });
}
export {};
