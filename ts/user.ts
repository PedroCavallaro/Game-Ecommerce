const info: NodeListOf<HTMLInputElement> = document.querySelectorAll(".info"),
    edit: HTMLImageElement | null = document.querySelector("#edit > img"),
    saveChangesBtn: HTMLInputElement|null = document.querySelector("#save-changes"),
    saveChangesDiv: HTMLDivElement | null = document.querySelector(".save-changes-div")

edit?.addEventListener("click", ()=>{
    info.forEach((e)=>{
        e.removeAttribute("readonly")
        e.classList.toggle("edit")
    })
   saveChangesDiv?.classList.toggle("show") 
}) 