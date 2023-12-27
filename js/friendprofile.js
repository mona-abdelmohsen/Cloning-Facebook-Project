let btn=document.querySelector("#but2")
btn.addEventListener("click",function(e){
    e.preventDefault();
    setTimeout(()=>{
        window.location="chat.html";
    },1000)
})