$(document).ready(function(){
    console.log('inscript');
    $(document).on('click','.btn_delete',function(event){
        event.preventDefault();
        let status=confirm("Are you sure to delete");
        // console.log(status);
        if(status)
        {
            let id=$(this).parent().attr('id');
            // console.log("id is "+id);

            $.ajax({
                method:'post',
                url:'delete_category.php',
                data:{id:id},
                success:function(response){
                    if(response=='success')
                    {
                        location.href='category.php';
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


    $(document).on('click','.cbtn_delete',function(event){
        event.preventDefault();
        let status=confirm("Are you sure to delete course");
        // console.log(status);
        if(status)
        {
            let id=$(this).parent().attr('id');
            // console.log("id is "+id);

            $.ajax({
                method:'post',
                url:'delete_course.php',
                data:{id:id},
                success:function(response){
                    if(response=='success')
                    {
                        location.href='course.php';
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


    $(document).on('click','.ins_delete',function(event){
        event.preventDefault();
        let status=confirm("Are you sure to delete instructor");
        // console.log(status);
        if(status)
        {
            let id=$(this).parent().attr('id');
            // console.log("id is "+id);

            $.ajax({
                method:'post',
                url:'delete_instructor.php',
                data:{id:id},
                success:function(response){
                    if(response=='success')
                    {
                        location.href='instructor.php';
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