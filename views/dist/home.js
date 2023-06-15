const shopCartBtn = document.querySelector("#shopCart"), shopCart = document.querySelector(".shop-cart-container"), closeCart = document.querySelector("#arrow-left"), add = document.querySelectorAll(".add"), item = document.querySelector(".item"), carrousel = document.querySelector(".img-carrousel"), covers = document.querySelectorAll(".i"), card = document.querySelectorAll(".card"), moveBtns = document.querySelectorAll(".move"), checkMove = document.querySelector(".check-move");
let countCard = 0;
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
    for (let i = 0; i < card.length; i++) {
        checkMove.innerHTML += ` <div id='${i}' class='check'></div>`;
    }
    const buttons = document.querySelectorAll(".check");
    buttons.forEach((e) => {
        e.addEventListener('click', () => {
            document.querySelectorAll(".check").forEach((ele) => {
                ele.style.background = "none";
            });
            e.style.backgroundColor = "#330f3c";
            e.style.transition = "0.2s";
            countCard = Number(e.id) * -20;
            card.forEach((ele) => {
                ele.style.transform = `translate(${countCard}rem)`;
                ele.style.transition = "2s ease";
            });
        });
    });
});
moveBtns.forEach((e) => {
    e.addEventListener("click", () => {
        if (e.id === "left") {
            countCard -= 20;
            card.forEach((ele) => {
                ele.style.transform = `translate(${countCard}rem)`;
                ele.style.transition = "2s ease";
            });
        }
        else if (e.id === "right") {
            if (countCard !== 0) {
                countCard += 20;
                card.forEach((ele) => {
                    ele.style.transform = `translate(${countCard}rem)`;
                    ele.style.transition = "2s ease";
                });
            }
        }
        if (countCard === (card.length * -20)) {
            countCard = 0;
            card.forEach((ele) => {
                ele.style.transform = `translate(0%)`;
                ele.style.transition = "2s ease";
            });
        }
    });
});
shopCartBtn?.addEventListener('click', () => {
    updateCart(item);
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
        const cover = e.parentElement?.childNodes[1].childNodes[1], tittle = e.parentElement?.childNodes[3], value = e.parentElement?.childNodes[9].childNodes[1].childNodes[1].childNodes[3], unity = e.parentElement?.childNodes[9].childNodes[1].childNodes[1].childNodes[3], cod = e.parentElement?.childNodes[5];
        const product = {
            cover: cover.src,
            tittle: tittle.innerText,
            value: Number(value.innerText),
            unityValue: Number(unity.innerText),
            cod: cod.innerHTML,
            qtd: 1
        };
        if (localStorage.getItem("cart")) {
            arrProducts = JSON.parse(localStorage.getItem("cart") || "{}");
            if (!(arrProducts.find((ele) => ele.tittle === product.tittle))) {
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
    });
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
                    <p id="tittleb${count}" class="game-tittle-cart">${e.tittle}</p>
                    <div class="action-buttons">
                        <input id="b${count}" class="action m" type="button" value="+">
                        <input class="action" type="button" value="${e.qtd}">
                        <input id="b${count}" class="action l" type="button" value="-">
                    </div>
                </div>
            </div>`;
            const actionBtns = document.querySelectorAll(".action");
            actionBtns.forEach((e) => {
                const qtd = e.parentElement?.childNodes[3];
                const name = document.querySelector(("#tittle" + e.id));
                e.addEventListener('click', () => {
                    verify(e, qtd, name);
                    if (qtd.value === "0") {
                        e.parentElement.parentElement.parentElement.remove();
                    }
                });
            });
            count++;
        }
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
                if (e.qtd === 0) {
                    arr = arr.filter(ele => ele.qtd !== 0);
                    arr.filter(ele => ele.qtd !== 0);
                }
            }
        }
        const arr2 = arr.filter((e) => e.qtd !== 0);
        localStorage.setItem("cart", JSON.stringify(arr2));
    });
    localStorage.setItem("cart", JSON.stringify(arr));
}
function verify(e, qtd, name) {
    if (e.classList.contains("m")) {
        qtd.value = Number(qtd.value) + 1;
        updateLs(name.innerHTML, e);
    }
    else if (e.classList.contains("l")) {
        if (qtd.value !== 0) {
            qtd.value = Number(qtd.value) - 1;
            updateLs(name.innerHTML, e);
        }
    }
}
export {};
