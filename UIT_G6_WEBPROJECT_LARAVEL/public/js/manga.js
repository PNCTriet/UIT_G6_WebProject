// const slider = document.querySelector('.slider');
// const CardWidth =slider.querySelector('.manga-card').offsetWidth
// const arrowBtns =document.querySelectorAll('.arrow')
// const sliderChildrens =[...slider.children]

// let cardPerview =Math.round(slider.offsetWidth / arrowBtns)
// sliderChildrens.slice(-cardPerview).reverse().forEach(card=>{
//     slider.insertAdjacentHTML("afterbegin",card.outerHTML)
// })
// sliderChildrens.slice(0,cardPerview).forEach(card=>{
//     slider.insertAdjacentHTML("beforeend",card.outerHTML)
// })

// arrowBtns.forEach((btn)=>{
//     btn.addEventListener('click',()=>{
//         console.log(CardWidth)
//         slider.scrollLeft += btn.id ==="leftArrow"?-CardWidth:CardWidth
//     })
// })
// let isDragging = false;
// let startX; // Starting mouse position
// let startScrollLeft; // Starting scroll position of the slider

// // Start dragging
// const dragStart = (e) => {
//     isDragging = true;
//     slider.classList.add('dragging');
//     startX = e.pageX; // Record the starting mouse position
//     startScrollLeft = slider.scrollLeft; // Record the starting scroll position
// };

// // Dragging
// const dragging = (e) => {
//     if (!isDragging) return;
//     const xDiff = e.pageX - startX; // Difference between current and starting mouse position
//     slider.scrollLeft = startScrollLeft - xDiff; // Adjust scroll position based on mouse movement
//     console.log(slider.scrollLeft)
// };

// // Stop dragging
// const dragEnd = () => {
//     isDragging = false;
//     slider.classList.remove('dragging');
// };
// const infiniteScroll =(e)=>{
//     e.preventDefault()
//     console.log(slider.scrollLeft)
//     if(Math.abs(slider.scrollLeft) === 0){
//         console.log("begin")
//         slider.scrollLeft =slider.scrollWidth-100
        
//     }else if(Math.ceil(slider.scrollLeft)===slider.scrollWidth - slider.offsetWidth){
//         console.log("end")
        
//         slider.scrollLeft =100
//     }
// }

// slider.addEventListener('mousedown', dragStart);
// slider.addEventListener('mousemove', dragging);
// document.addEventListener('mouseup', dragEnd);
// slider.addEventListener("scroll",(e)=>{infiniteScroll(e)})

const slider = document.querySelector('.slider');
const CardWidth = slider.querySelector('.manga-card').offsetWidth;
const arrowBtns = document.querySelectorAll('.arrow');
const sliderChildrens = [...slider.children];
let setTime;

let cardPreview = Math.round(slider.offsetWidth / CardWidth);

// Duplicate cards for infinite scroll
sliderChildrens.slice(-cardPreview).reverse().forEach((card) => {
    slider.insertAdjacentHTML("afterbegin", card.outerHTML);
});
sliderChildrens.slice(0, cardPreview).forEach((card) => {
    slider.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Arrow button functionality
arrowBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        slider.scrollLeft += btn.id === "leftArrow" ? -CardWidth : CardWidth;
        infiniteScroll(); // Handle infinite scroll after button click
    });
});

let isDragging = false;
let startX; // Starting mouse position
let startScrollLeft; // Starting scroll position of the slider

// Start dragging
const dragStart = (e) => {
    isDragging = true;
    slider.classList.add('dragging');
    startX = e.pageX; // Record the starting mouse position
    startScrollLeft = slider.scrollLeft; // Record the starting scroll position
};

// Dragging
const dragging = (e) => {
    if (!isDragging) return;
    const xDiff = e.pageX - startX; // Difference between current and starting mouse position
    slider.scrollLeft = startScrollLeft - xDiff; // Adjust scroll position based on mouse movement
};

// Stop dragging
const dragEnd = () => {
    isDragging = false;
    slider.classList.remove('dragging');
};

const autoPlay = () => {
    if (window.innerWidth <= 800) return; // Don't auto-slide on mobile devices
    setInterval(() => {
        slider.scrollLeft += CardWidth;
    }, 2500); // Scroll every 2.5 seconds
};

// Start the autoPlay function
autoPlay();
// Infinite scroll logic
const infiniteScroll = () => {
    if (isDragging) return; // Avoid triggering during drag
    if (slider.scrollLeft <= 0) {
        console.log("to begin")
        slider.classList.add("no-smooth")
        slider.scrollLeft = slider.scrollWidth - slider.offsetWidth - CardWidth;
        slider.classList.remove("no-smooth")
    } else if (
        Math.ceil(slider.scrollLeft) >=
        slider.scrollWidth - slider.offsetWidth
    ) {
        console.log("to end")
        slider.classList.add("no-smooth")
        slider.scrollLeft = CardWidth;
        slider.classList.remove("no-smooth")
    }
};

// Attach event listeners
slider.addEventListener('mousedown', dragStart);
slider.addEventListener('mousemove', dragging);
document.addEventListener('mouseup', dragEnd);
slider.addEventListener("scroll", infiniteScroll);
