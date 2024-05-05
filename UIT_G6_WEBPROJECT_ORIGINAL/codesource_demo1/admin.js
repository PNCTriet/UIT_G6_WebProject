import { dataTotal } from "./dummyData.js"

const closett =document.querySelector('.close')
const menu =document.querySelector('.bx-menu')
const navbar =document.querySelector('.navbar')


closett.addEventListener('click',()=>{
    console.log("cc nhe")
    navbar.classList.toggle('active')
    navbar.classList.toggle('navbar')
})

menu.addEventListener('click',()=>{
    navbar.classList.toggle('active')
    navbar.classList.toggle('navbar')
})


// fecth dataTotal
const total =document.querySelector('.total')
dataTotal.map((element)=>{
    total.innerHTML+=`
        <div class="total-view total-term">
            <div class="left">
                <h3>${element.title}</h3>
                <h2>${element.amount}</h2>
                <p>Last 24 Hours</p>
            </div>
            <div class="progress">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100">
                    <circle cx="50" cy="50" r="40" style="stroke-dashoffset:${250-element.rate*250}" />
                </svg>
                <div class="number">
                    <p>${element.rate*100}%</p>
                </div>
            </div>
            
        </div>
    `
})


const ctx = document.getElementById('myChart_income');
const lineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels:['January', 'February', 'March', 'April', 'May', 'June','July'],
        datasets: [{
            label: 'Income of each month',
            data: [1000, 5000, 3000, 8000, 5000, 2000, 7000],
            fill: false,
            borderColor: 'RGB(75, 192, 192)',
            backgroundColor:'rgba(85,85,85,1)',
            tension: 0.1
        }]
    },
    options: {
        responsive:true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
lineChart.render()

// ----------------barChart---------------------

const name_movies =['NỐT TRẦM ĐỜI BÁC SĨ','LIỆT DIỄM CHI VŨ CANH KỶ','LOVELY RUNNER','BEAUTY AND THE DEVOTED','BLOOD FREE']
const views=[1000000,2000000,3500000,1500000,5000000]
const barColors=["red", "green","blue","orange","brown"]
const ctx1 =document.querySelector('#mychart_topmovie')
new Chart(ctx1, {
  type: "bar",
  
  data: {
    labels: name_movies,
    datasets: [{
      label:name_movies[0],
      backgroundColor: barColors,
      data: views
    }]
  },
  options: {
    responsive:true
  }
});


// items
const items =document.querySelectorAll('.link')
let item_detail =document.querySelector('.container').children
item_detail =Array.from(item_detail)
console.log(item_detail)
items.forEach(element => {
   
    element.addEventListener('click',()=>{
        item_detail.forEach((item)=>{
            navbar.classList.toggle('active')
            navbar.classList.toggle('navbar')
          if(item.getAttribute('id')==element.getAttribute('aria-label')){
            item.setAttribute('aria-hidden',true)
          }else{
            item.setAttribute('aria-hidden',false)
          }
        })
    })
   
})

// Remove or update button
const threeDot =document.querySelectorAll('.remove')
const removeandupdate =document.querySelectorAll('.removeandupdate')
threeDot.forEach((item,index)=>{
    item.addEventListener('click',()=>{
        console.log(removeandupdate[index].getAttribute('aria-hidden'))
        removeandupdate[index].setAttribute('aria-hidden',removeandupdate[index].getAttribute('aria-hidden')=='true'?'false':'true')
        console.log(removeandupdate[index].getAttribute('aria-hidden'))
    })
})
