$(function(){
    let edit = false;

    console.log('hello world, funciona jquery');
    // $('#task-result').hide();
    feetchTasks();

    $('#search').keyup(function(){
        if($('#search').val()){
            let search = $('#search').val();
            //  console.log(search);
            $.ajax({
                url: 'task-search.php',
                type: 'POST',
                data: {search},
                success: function(response){
                    // console.log(response);
                    let tasks =JSON.parse(response);
                    let template = '';
                    // console.log(tasks);
                    tasks.forEach(task =>{
                        // console.log(task);
                        template += `<li>
                            ${task.name}
                        </li>`;
                    });
                    $('#container').html(template)
                    $('#task-result').show();
                }
            });
        }
    })

    $('#task-form').submit(function(e){
        // console.log('enviando');
        const postData = {
            name: $('#name').val(),
            descripcion: $('#description').val(),
            id: $('#taskId').val()
        };

        const url = edit === false ? 'task-add.php' : 'task-edit.php';
        console.log(postData, url);
        // console.log(postData);

        $.post(url, postData, function(response){
            console.log(response);
            feetchTasks();

            $('#task-form').trigger('reset');
        });
        e.preventDefault();
    });

    function feetchTasks(){
        $.ajax({
            url:'task-list.php',
            type:'GET',
            success: function(response){
                //console.log(response);
                // JSON.parse(response){
                    let tasks = JSON.parse(response);
                    let template = '';
                    tasks.forEach(task =>{
                        template+=` 
                            <tr taskId="${task.id}">
                                <td>${task.id}</td>
                                <td>
                                    <a hrfe="#" class="task-item">${task.name}</a>
                                </td>
                                <td>${task.descripcion}</td>
                                <td>
                                    <button class="task-delete btn btn-danger">Delete</button>
                                </td>
                            </tr>                                                                                                                                                                           
                        `
                    });
                    $('#tasks').html(template);

                //}
            }
        })
    }

    $(document).on('click','.task-delete',function(){
        if(confirm('Are you sure you want to delete it?')){
            // console.log('clicked');
            // console.log($(this));
            let element = $(this)[0].parentElement.parentElement; 
            let id = $(element).attr('taskId');
            console.log(id);    
            $.post('task-delete.php', {id}, function(response){
                console.log(response);
                feetchTasks();
            })
        }
    }); 

    $(document).on('click','.task-item ', function(){
        // console.log('editing');
        let element = $(this)['0'].parentElement.parentElement;
        let id = $(element).attr('taskId');
        // console.log(id);
        $.post('task-single.php',{id}, function(response){
            // console.log(response);
            const task = JSON.parse(response);
            $('#name').val(task.name);
            $('#description').val(task.descripcion);
            $('#taskId').val(task.id);
            edit = true;

        });

    });

});