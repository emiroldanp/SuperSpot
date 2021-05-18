

    function deleteComic(id, r){
        console.log(id);
        let str = 'comments/'+id+''
        console.log(document.getElementById("tableRow"+id));
        document.getElementById("tableRow"+id).remove();

        $.ajax({
            url: str,
            method: 'DELETE',
            headers:{
                'Accept': 'application/json',
                'X-CSRF-Token': $('meta[name="csrf-token"').attr('content'),
                'Access-Control-Allow-Origin': '*'
            }
        })


    }
    function updateLikes(id, current_user){
        let status = "true"
        let str = 'comments/likes/'+id+'/'+current_user
        console.log(str);
        $.ajax({
            url: str,
            method: 'PUT',
            headers:{
                'Accept': 'application/json',
                'X-CSRF-Token': $('meta[name="csrf-token"').attr('content')
            },
            data:{
                id:id,
                status:status
            }
        }).done(function(response) {
            console.log("Exito", response)
            document.getElementById("likes"+response.id).innerHTML = response.likes
            document.getElementById("dislikes"+response.id).innerHTML = response.dislikes
            updateEvent(response.id, response.user_id, current_user)
        })
        .fail(function(jqXHR, response) {
            console.log('Fallido', response);
        });

    }
    function updateDislikes(id, current_user){
        let status = "true"
        let str = 'comments/dislikes/'+id+'/'+current_user
        console.log(str);
        $.ajax({
            url: str,
            method: 'PUT',
            headers:{
                'Accept': 'application/json',
                'X-CSRF-Token': $('meta[name="csrf-token"').attr('content')
            },
            data:{
                id:id,
                status:status
            }
        }).done(function(response) {
            console.log("Exito", response.dislikes)
            
            if (document.getElementById("likes"+response.id).innerHTML != response.likes) {
                updateEvent(response.id, response.user_id, current_user)
            }
            if ( document.getElementById("dislikes"+response.id).innerHTML != response.dislikes) {
                
            }

            document.getElementById("likes"+response.id).innerHTML = response.likes
            document.getElementById("dislikes"+response.id).innerHTML = response.dislikes
            updateEvent(response.id, response.user_id, current_user)
            
        })
        .fail(function(jqXHR, response) {
            console.log('Fallido', response);
        });

    }
    function updateEvent(id, escritor, usuario){

        let str = 'event/'+id+'/'+escritor+'/'+usuario

        $.ajax({
            url: str,
            method: 'GET',
            headers:{
                'Accept': 'application/json',
                'X-CSRF-Token': $('meta[name="csrf-token"').attr('content')
            }
        }).done(function(response) {
            console.log( "Exito", response);

        })
        .fail(function(jqXHR, response) {
            console.log('Fallido', jqXHR);
        });

    }
    
