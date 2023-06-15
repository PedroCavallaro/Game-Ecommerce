const cpfInpt : HTMLInputElement | null = document.querySelector("#cpf")


cpfInpt?.addEventListener("keydown", (e)=>{
    if(isNaN(Number(e.key)) && e.key !== "Backspace"){
        e.preventDefault()
    }
})