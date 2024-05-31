// Data for rendering video random when reloading page
function name1(){
    window.scrollTo({top:0,behavior:'smooth'})
}
name1()
const data =[{
    "title":"Big Buck Bunny",
    "description":"Three rodents amuse themselves by harassing creatures of the forest. However, when they mess with a bunny, he decides to teach them a lesson.",
    "videoUrl":"http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4",
    "thumbnailUrl":"https://upload.wikimedia.org/wikipedia/commons/7/70/Big.Buck.Bunny.-.Opening.Screen.png",
    "genre":"Comedy",
    "duration":"10 minutes"
 },
 {
    "title":"Sintel",
    "description":"A lonely young woman, Sintel, helps and befriends a dragon, whom she calls Scales. But when he is kidnapped by an adult dragon, Sintel decides to embark on a dangerous quest to find her lost friend Scales.",
    "videoUrl":"http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/Sintel.mp4",
    "thumbnailUrl":"http://uhdtv.io/wp-content/uploads/2020/10/Sintel-3.jpg",
    "genre":"Adventure",
    "duration":"15 minutes"
 },
 {
    "title":"Tears of Steel",
    "description":"In an apocalyptic future, a group of soldiers and scientists takes refuge in Amsterdam to try to stop an army of robots that threatens the planet.",
    "videoUrl":"http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/TearsOfSteel.mp4",
    "thumbnailUrl":"https://mango.blender.org/wp-content/uploads/2013/05/01_thom_celia_bridge.jpg",
    "genre":"Action",
    "duration":"12 minutes"
 }]

// const video =document.querySelector('.video')
// const source =document.querySelector('.video-source')
const videoArticle =document.querySelector('.video-article')
const randomSource =()=>{
    const number_random =Math.floor(Math.random()*2)
   
    // video.src =data[number_random].videoUrl
    // video.poster=data[number_random].thumbnailUrl
    videoArticle.innerHTML=`
    <div class="video-detail">
        <video class="video" width="100%" autoplay poster=${data[number_random].thumbnailUrl}>
            <source type="video/mp4" class="video-source" src=${data[number_random].videoUrl} poster=${data[number_random].videoUrl} >
            Your browser does not support this video
        </video>
        <div class='movie-detail'>
            <h3>${data[number_random].title}</h3>
            <p>${data[number_random].description}</p>
            <div class='btn_video'>
                <Button class='btn_play'>
                    <i class='bx bx-play'></i>
                    <p class='play'>Phát</p>
                </Button>
                <Button class='btn_seemore'>
                    <i class='bx bx-info-circle' ></i>
                    <p class='info-other'>Thông tin khác</p>
                </Button>
            </div>

        </div>
    </div>
    `

    const video =document.querySelector('.video')
    setTimeout(async()=>{
        document.querySelector('.video').muted=false
       
        // window.scrollTo({top:0})
        try{
            await video.play()
        }catch(err){
            // video.muted =true
        
            video.play()
        }
       
    },1000)
    window.addEventListener('scroll',(event)=>{
        
      
        if(window.scrollY +150>video.clientHeight){
            // console.log(video.volume,'cc')
            if(video.volume>=0.2){
                video.volume-=0.05
                
            }else{
                video.pause()
            }
            
        }else{
            if(video.volume<=0.8 && window.scrollY<video.clientHeight+100){
                video.volume+=0.05
                // console.log(video.volume,'cc')
            }else
                video.play()
        }
    })


   
}

// window.scrollTo({top:10,behavior:'smooth'})
randomSource()
// window.onload(function()  {
//     var e = document.Event('keydown', { keyCode: 39 });// right arrow key
//     setTimeout(function() {
//     document.trigger(e);
//              }, 1000);
// });
 