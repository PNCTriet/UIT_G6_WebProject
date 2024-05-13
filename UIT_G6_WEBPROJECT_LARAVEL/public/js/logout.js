const form_info =document.querySelector('.form-info');
const dropdown_toggle = document.querySelector('.dropdown-toggle')

dropdown_toggle.addEventListener('click',()=>{
    form_info.classList.toggle('show')
    form_info.classList.toggle('hidden')
  
})