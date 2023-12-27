// //friends
// let friendbtn=document.querySelector("#bt1");
// console.log(friendbtn)
// friendbtn.addEventListener('click',function(e){
//     e.preventDefault();
//     setTimeout(()=>{
//         window.location="allfrinds.html";
//     },1000)
// })

// let friendrequ=document.querySelector("#bt2");
// console.log(friendrequ)
// friendrequ.addEventListener('click',function(e){
//     e.preventDefault();
//     setTimeout(()=>{
//         window.location="requestfriends.html";
//     },1000)
// })




$("#bt1").click(function(){
    $("#nav1").show(500);
    $("#nav2").hide(500);

})
$("#bt2").on("click",function(){
    $("#nav2").show(500);
    $("#nav1").hide(500);
})