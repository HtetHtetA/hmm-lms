$(document).ready(function(){
    console.log('inscript');
    $(document).on('click','.delete_trainee',function(event){
        event.preventDefault();
        let status=confirm("Are you sure to delete");
        // console.log(status);
        if(status)
        {
            let id=$(this).parent().attr('id');
            // console.log("id is "+id);

            $.ajax({
                method:'post',
                url:'delete_trainee.php',
                data:{id:id},
                success:function(response){
                    if(response=='success')
                    {
                        location.href='trainee.php';
                    }
                    else
                    {
                        alert(response);
                    }
                },
                error:function(error)
                {
                    alert(error);
                }
            })
        }
    })




    $('#mytable').DataTable();
})