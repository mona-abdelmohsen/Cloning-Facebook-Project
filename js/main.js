let like=document.querySelectorAll(".frist");
let dislike=document.querySelectorAll(".second");

for(let i=0;i<like.length;i++){
    like[i].addEventListener('click',function(){
        like[i].classList.add("like")
        dislike[i].classList.remove("dislike");
    })
}
for(let i=0;i<like.length;i++){
    like[i].addEventListener('dblclick',function(){
        like[i].classList.remove("like")
       
    })
}
for(let i=0;i<dislike.length;i++){
    dislike[i].addEventListener('click',function(){
        dislike[i].classList.add("dislike")
        like[i].classList.remove("like");
        
    })
}
for(let i=0;i<dislike.length;i++){
    dislike[i].addEventListener('dblclick',function(){
        dislike[i].classList.remove("dislike")
       
    })
}

//coment
let comenticon=document.querySelectorAll("i.third");
let coment=document.querySelectorAll(".comentform");
for(let i=0;i<dislike.length;i++){
    comenticon[i].addEventListener('click',function(){
        // e.preventDefault();
        coment[i].style.display="block"
    })
}
for(let i=0;i<dislike.length;i++){
    comenticon[i].addEventListener('dblclick',function(){
        // e.preventDefault();
        coment[i].style.display="none"
    })
}



// $('i.frist').on('click',function(){
//     $(this).addClass('like')
//     $('i.second').removeClass('dislike')
// })
// $('i.frist').on('dblclick',function(){
//     $(this).removeClass('like')
// })

// $('i.second').on('click',function(){
//     $(this).addClass('dislike')
//     $('i.frist').removeClass('like')
// })
// $('i.second').on('dblclick',function(){
//     $(this).removeClass('dislike')
// })
// $('i.third').on('click',function(){
//     let x=$('.coment')
//     $('.comentform').css({'display':'block'})
// })
// $('i.third').on('dblclick',function(){
//     $('.comentform').css({'display':'none'})
// })