if(sessionStorage.getItem('theme')===null){
    sessionStorage.setItem('theme','light')
}

const theme =document.querySelector('[theme]')
theme.setAttribute('theme',sessionStorage.getItem('theme'))
const btn_theme =document.querySelector('.theme-switch')
btn_theme.addEventListener('click',()=>{
    btn_theme.setAttribute('aria-pressed',btn_theme.getAttribute('aria-pressed')==`true`?`false`:`true`)
    sessionStorage.setItem('theme',sessionStorage.getItem('theme')=='light'?'dark':'light')
    console.log(sessionStorage.getItem('theme'))
    theme.setAttribute('theme',sessionStorage.getItem('theme'))
    
})