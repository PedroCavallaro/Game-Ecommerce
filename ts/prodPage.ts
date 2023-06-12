const previews:NodeListOf<HTMLImageElement> = document.querySelectorAll(".img"),
    mainImg: HTMLImageElement | null = document.querySelector(".main-img")


previews.forEach((e)=>{
    e.addEventListener("click", ()=>{
        const path = mainImg!.src;
        mainImg!.src = e.src
        e.src = path
    })
})

