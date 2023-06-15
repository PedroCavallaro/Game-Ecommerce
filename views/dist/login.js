"use strict";
const cpfInpt = document.querySelector("#cpf");
cpfInpt?.addEventListener("keydown", (e) => {
    if (isNaN(Number(e.key)) && e.key !== "Backspace") {
        e.preventDefault();
    }
});
