
// Scroll To
const scrollTop =document.querySelector(".scroll-to-top")
window.addEventListener("scroll",()=>{
    // console.log(window.scrollY)
    if(window.scrollY>=100){
        scrollTop.style.display="block";
        scrollTop.style.zIndex=10;
    }else{
        scrollTop.style.display="none";
    }
})

scrollTop.addEventListener("click",()=>{
    window.scrollTo({top:0,behavior:"smooth"})
})




// UPDATE-MOVIE OR UPDATE-VOUCHER
// const update =document.querySelectorAll('.update');
// const form= document.querySelector('.car')


// Close form update
// const closes =document.querySelectorAll('.closes');





// delete movie
const delete_btn =document.querySelectorAll('.delete')
const delete_form =document.querySelector('#form_dlt')
// const table_movie =document.querySelector('.card-body')

// const cancel =document.querySelector('#cancel')
// cancel.addEventListener('click',()=>{
//     delete_form.style.display='none'
//     delete_form.classList.remove('no_active')
//     delete_form.setAttribute('action',"")
//     document.getElementsByClassName('table-movie')[0].style.pointerEvents='auto'

// })

window.cancel_btn =()=>{
    delete_form.style.display='none'
    delete_form.classList.remove('no_active')
    delete_form.setAttribute('action',"")
    document.getElementsByClassName('table-movie')[0].style.pointerEvents='auto'
}


window.update_voucher=async(tag)=>{
    const id =tag.value
    const response =await fetch(`/get-voucher/${id}`)
    const result = await response.json()
    // console.log(result,result[0])
    document.getElementById('update_form').style.display="flex";
    document.getElementById('update_form').setAttribute('action',`/update-voucher/${id}`)

    document.querySelector('#name_voucher').value=result[0].name
    document.querySelector('#code').value=result[0].code
    document.querySelector('#discount').value=result[0].discount_percentage
    document.querySelector('#status').value=result[0].status
    

    // document.getElementsByTagName('body')[0].style.overflow='hidden';
    document.getElementsByClassName('table-movie')[0].style.pointerEvents='none'
}

window.update_movie=async(tag)=>{
    const id =tag.value;
            
    const response = await fetch(`/get-movie/${id}`)
    const movie =await response.json();
    // console.log(form[0])
    document.getElementById('update_movie').style.display="flex";
    document.getElementById('update_movie').setAttribute('action',`/update-movie/${id}`)
    console.log(movie[0],movie[0].title)
    document.querySelector('#name_movie').value=movie[0].title
    document.querySelector('#description').value =movie[0].description
    document.querySelector('#category').value=movie[0].category_id
    document.querySelector('#specialgroup').value=movie[0].specialgroup_id
    document.querySelector('#trailer_link').value=movie[0].trailer_link
    document.querySelector('#movie_link').value =movie[0].movie_link

    
    // document.getElementsByTagName('body')[0].style.overflow='hidden';
    document.getElementsByClassName('table-movie')[0].style.pointerEvents='none'
}

window.update_user=async(tag)=>{
    const id =tag.value
    const response =await fetch(`/get-user/${id}`)
    const result = await response.json()
    // console.log(result,result[0])
    document.getElementById('update_form').style.display="flex";
    document.getElementById('update_form').setAttribute('action',`/update-user/${id}`)
    document.querySelector('#fullname_1').value=result[0].name
    document.querySelector('#dayofbirth_1').value=result[0].birthday
    document.querySelector('#email_1').value=result[0].email
    document.querySelector('#phoneNumber_1').value=result[0].phoneNumber
    document.querySelector('#address_1').value=result[0].address
    

    // document.getElementsByTagName('body')[0].style.overflow='hidden';
    document.getElementsByClassName('table-movie')[0].style.pointerEvents='none'
}

// close update or create 

window.close_form =(id_tag)=>{
    document.getElementById(`${id_tag}`).style.display="none";
    document.getElementsByTagName('body')[0].style.overflow='visible';
    document.getElementsByClassName('table-movie')[0].style.pointerEvents='auto'
}

window.delete_ =(tag,routing)=>{
    const delete_form =document.querySelector('#form_dlt')
    delete_form.classList.add('no_active')
    delete_form.style.display='flex'
    delete_form.setAttribute('action',`/${routing}/${tag.value}`)
    document.getElementsByClassName('table-movie')[0].style.pointerEvents='none'
}

// send mail
window.send_mail=function(tag){
    const email =tag.getAttribute('email')
    console.log(email)
    document.getElementById("add_form").style.display='flex'
    document.querySelector('.nameEmail').innerHTML=email
    document.querySelector('#add_form').setAttribute('action',`/mail-to/${tag.value}`);
}

document.querySelector('#sidebarToggleTop').addEventListener("click",()=>{
    document.querySelector(".sidebar").classList.toggle("open")
    document.querySelector(".sidebar").classList.toggle("close")
    
})

window.addEventListener('resize',()=>{
    if(window.innerWidth<=500){
        if(document.querySelector('.sidebar').classList.contains('open')){
            document.querySelector('.sidebar').classList.remove('open')
        }
        document.querySelector('.sidebar').classList.add("close")
    }else{
        if(document.querySelector('.sidebar').classList.contains('close')){
            document.querySelector('.sidebar').classList.remove('close')
        }
        document.querySelector('.sidebar').classList.add("open")
    }
    
})