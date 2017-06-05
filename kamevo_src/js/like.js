$('.likes').click(function() {
    if ($(this).attr('src', 'img/liked.png')) {
        $(this).attr('src', 'img/poucevert.png');
    } else {
        $(this).attr('src', 'img/poucevert.png');
    }
});
// $(".dislikes").click(function(){
// 	$(this).attr('src', "img/disliked.png")
// });