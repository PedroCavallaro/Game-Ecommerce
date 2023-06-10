"use strict";
const cepInput = document.querySelector("#cep"), cpf = document.querySelector("#cpf"), requiredFields = document.querySelectorAll(".req"), form = document.querySelector("form");
form?.addEventListener("submit", (ele) => {
    requiredFields.forEach((e) => {
        if (e.value == "") {
            ele.preventDefault();
        }
        if (cpf != null) {
            cpf.value = cpf?.value.split(".").join("")
                .split("-").join("");
        }
    });
});
cepInput?.addEventListener('blur', async () => {
    try {
        const response = await fetch(`https://viacep.com.br/ws/${cepInput.value}/json/`)
            .then((res) => res.json());
        for (const key in response) {
            if (document.getElementById(`${key}`)) {
                let fields = document.getElementById(`${key}`);
                fields.value = response[key];
            }
        }
    }
    catch {
    }
});
