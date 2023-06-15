const left = document.querySelector(".left"), middle = document.querySelector(".middle"), right = document.querySelector(".right"), itensContainer = document.querySelector(".items-cart-container"), cardLabels = document.querySelectorAll(".payment-methods > label"), totalValue = document.querySelector("#value"), pay = document.querySelector(".pay > input[type='submit']"), modal = document.querySelector(".modal-container");
window.addEventListener("load", () => {
    const url = new URLSearchParams(window.location.href);
    if (url.get("s")) {
        localStorage.removeItem("cart");
        modal?.classList.add("show");
    }
    else {
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
    }
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
pay?.addEventListener('click', () => {
    let arr = [];
    arr = JSON.parse(localStorage.getItem("cart") || '{}');
    let cod = "";
    let qtd = "";
    let total = 0;
    let value = "";
    arr.forEach((e) => {
        cod += "," + e.cod;
        qtd += "," + e.qtd;
        value += "," + e.value;
        total += Number(e.value);
    });
    setCookie("buy", cod, 2);
    setCookie("qtd", qtd, 2);
    setCookie("total", String(total), 2);
    setCookie("unity", String(value), 2);
});
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
export {};
