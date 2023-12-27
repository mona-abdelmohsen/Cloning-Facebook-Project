let btn=document.querySelector("#but1")
btn.addEventListener("click",function(e){
    e.preventDefault();
    setTimeout(()=>{
        window.location="updateDaties.php";
    },1000)
})