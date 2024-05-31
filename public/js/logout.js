const form_info = document.querySelector(".form-info");
const dropdown_toggle = document.querySelector(".dropdown-toggle");

dropdown_toggle.addEventListener("click", () => {
    form_info.classList.toggle("show");
    form_info.classList.toggle("hidden");
});

window.openChatBot = (tag) => {
    const chatContent = document.querySelector(".chat-content");
    tag.style.display = "none";
    chatContent.style.display = "flex";
};

window.closeChatBot = (tag) => {
    const logoChat = document.querySelector(".logo-chat");
    document.querySelector(".chat-content").style.display = "none";
    logoChat.style.display = "flex";
};


let url
window.dem=0
window.add_image = () => {
    const add_image = document.querySelector(".add_img");
    add_image.click();
    add_image.addEventListener("input", () => {
        // console.log(add_image.value,add_image.files)
        const thumbnailsEl = document.querySelector(".temp_image");
        thumbnailsEl.innerHTML = "";
        const file = add_image.files[0];
        url = URL.createObjectURL(file);
      
        dem=1
        thumbnailsEl.innerHTML += `<img class="thumb img-thumbnail" src="${url}" />`;
    });
};

window.sendMessage = () => {
    const contentText = document.querySelector(".content-text");
    const text = document.querySelector('[name="text_file"]').value;
    const csrf_token = document.head.querySelector(
        '[name="csrf-token"]'
    ).content;
    const add_image = document.querySelector(".add_img");
    let img_html = "";

    if (url) {
        // img_html = `<img class="img-chatbox " src="${url}" onload="window.URL.revokeObjectURL(this.src)"/>`; 
        img_html = `<img class="img-chatbox " src="${url}">`; 
    }

    contentText.innerHTML += `
        <div class="message-text message-bot-text" style="display: flex; justify-content: flex-end;">
            <div>
                ${img_html}
                <p class="msg msg_user">
                    ${text}
                </p>
            </div>
            <img class="img-chat" src="${contentText.getAttribute("user")}"/>
        </div>
        <div class="message-text ">   
            <img class="img-chat" src="../datasources/img/netflop_chatbox.png"/>    
            <div>
                <p class="msg msg_bot skeleton"></p>
            </div> 
        </div>
    `;

    let text_bot = document.querySelectorAll(".msg_bot");
    text_bot = text_bot[text_bot.length - 1];

    const file = add_image.files[0];
    const formData = new FormData();
    if(dem==1){
        console.log("check active")
       
        formData.append("image", file);
        dem=0
    }
    
    formData.append("question", text);
    document.querySelector(".temp_image").innerHTML = "";
    document.querySelector('[name="text_file"]').value = "";

    fetch("/text-image", {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-Token": csrf_token,
        },
    })
        .then((res) => res.json())
        .then((data) => {
            text_bot.classList.remove("skeleton");
            text_bot.innerHTML = data.text;
        })
        .catch((err) => {
            text_bot.classList.remove("skeleton");
            text_bot.innerHTML = "Lỗi hệ thống.Vui lòng thử lại!."
            console.log(err.message)});

    // Reset the URL after sending the message
    url = "";
};

window.UserImage =(tag)=>{
   
       
    let avatarInput =document.getElementById('avatarInput')
    avatarInput.click();
    avatarInput.addEventListener("input",()=>{
        let image_url =avatarInput.files[0]
        let create_url = URL.createObjectURL(image_url)
        tag.src=`${create_url}`

    })
        
     
}

   


