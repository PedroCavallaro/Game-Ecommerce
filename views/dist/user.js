"use strict";
const info = document.querySelectorAll(".info"), edit = document.querySelector("#edit > img"), saveChangesBtn = document.querySelector("#save-changes"), saveChangesDiv = document.querySelector(".save-changes-div");
edit?.addEventListener("click", () => {
    info.forEach((e) => {
        e.removeAttribute("readonly");
        e.classList.toggle("edit");
    });
    saveChangesDiv?.classList.toggle("show");
});
