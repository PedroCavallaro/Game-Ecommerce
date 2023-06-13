"use strict";
const previews = document.querySelectorAll(".img"), mainImg = document.querySelector(".main-img");
previews.forEach((e) => {
    e.addEventListener("click", () => {
        const path = mainImg.src;
        mainImg.src = e.src;
        e.src = path;
    });
});
