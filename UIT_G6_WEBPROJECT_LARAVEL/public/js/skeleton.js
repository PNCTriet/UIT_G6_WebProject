// Remove inform
window.notice =document.querySelector(".notice")
window.info =document.querySelector(".info");
info.addEventListener("animationend",()=>{
    console.log("cc")
    notice.removeChild(info);
    
})
