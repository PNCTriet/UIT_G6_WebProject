window.msg_profile =document.querySelector(".msg_profile")
window.info_profile=document.querySelector('.info_profile')
info_profile.addEventListener("animationend",()=>{
    msg_profile.removeChild(info_profile)

})