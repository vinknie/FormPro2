
// Effet du menu au scroll

$(window).on("scroll", function () {
    if ($(window).scrollTop() > 200) {
        $('nav').addClass('black');
    }

    else {
        $('nav').removeClass('black');
    }
})

// Changer le contenu des div dans Admin 


$('.click').click(function(){
    $('.target').hide();
    $('#div'+$(this).attr('target')).show();
});

// $("#add").click(function(){
//     alert('ok');
//     // $("#table_field").append(html);
// });


// let go = document.querySelector('.fields');
// let btn = document.querySelector('.btn');
// btn.addEventListener('click' , addfields);

// function addfields(e){
//     e.preventDefault();
//     go.innerHTML += '<input type="text" name="nommatiere" placeholder="Nom de la Matiere">'
//     console.log(go);
// }

// document.querySelector("#btncreate").addEventListener("click",function(event){
//     event.preventDefault();
// })