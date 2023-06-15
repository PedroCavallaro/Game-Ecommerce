"use strict";
const chooseFile = document.getElementById("choose-file");
const imgPreview = document.getElementById("img-preview");

chooseFile.addEventListener("change", function () {
  getImgData();
});

function getImgData() {
  const files = chooseFile.files;
  if (files) {
    imgPreview.innerHTML = "";
    Array.from(files).forEach((element) => {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(element);
      fileReader.addEventListener("load", function () {
        imgPreview.style.display = "block";
        imgPreview.innerHTML += '<img src="' + this.result + '" />';
      });
    });
  }
}
