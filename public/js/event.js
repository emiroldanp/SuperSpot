

 $( document ).ready(function() {
    window.Echo.channel('commentsChannel').listen('CommentsEvent', (e) => {     
    
    console.log(e)
    if (e.id_escritor.localeCompare(document.getElementById("currentUser").value) == 0) {
        console.log($('.toast').toast('show'));
    }

    }); 
});