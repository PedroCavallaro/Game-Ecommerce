const cepInput:HTMLInputElement | null  = document.querySelector("#cep"),
    cpf: HTMLInputElement | null = document.querySelector("#cpf"),
    requiredFields: NodeListOf<HTMLInputElement> | null = document.querySelectorAll(".req"),
    form: HTMLFormElement | null = document.querySelector("form")


form?.addEventListener("submit", (ele) =>{
    requiredFields.forEach((e) => {
        if(e.value == ""){
            ele.preventDefault()
            
        }
        if(cpf != null){
            cpf.value = cpf?.value.split(".").join("")
                                    .split("-").join("")
        }
    })
})
cpf?.addEventListener("keydown", (e)=>{
    if(isNaN(Number(e.key)) && e.key !== "Backspace"){
        e.preventDefault()
    }
    if(cpf.value.length === 11 && e.key !== "Backspace"){
        e.preventDefault()
    }
})
cepInput?.addEventListener("keydown", (e)=>{
    if(isNaN(Number(e.key)) && e.key !== "Backspace"){
        e.preventDefault()
    }
    if(cepInput.value.length === 8 && e.key !== "Backspace"){
        e.preventDefault()
    }
})

cepInput?.addEventListener('blur', async ()=>{
    try{
      
        const response =  await fetch(`https://viacep.com.br/ws/${cepInput.value}/json/`)
                                         .then((res) => res.json())
                                         
         for(const key in response){
            if(document.getElementById(`${key}`)){
     
                 let fields:any = document.getElementById(`${key}`) 
                 fields.value = response[key]
             }
         }
    }catch{

    }
})