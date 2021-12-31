<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search</title>
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<body>

    <div id="search-box">
        <input id="search" onkeyup="june()" name="search" type="text" autocomplete="off" placeholder="Search here" />
        <div id="result"> </div>
    </div>
<script>




var a = [];

   function june()
    {
        var inputVal = $('#search').val();

// if (inputVal) 
// {    

    if (a[inputVal])
    {
        var values=a[inputVal];
        console.log(values);
        var res = '';
        for (var element of values) 
        { 
            res += "<p>"+element+"</p>";
           
        }
         $('#result').html(res);
        
    }

    else 
    {
        $.ajax
        ({
        	type:'post',
        	url:'end.php',
        	data:'val='+inputVal,
        	success:function(resp)
        	{
                var data = JSON.parse(resp);

                a[inputVal]=data;

                var values=a[inputVal];
                var res = '';
                for (var element of values) 
                { 
                    res += "<p>"+element+"</p>";
                }
                $('#result').html(res);
                
        	}
        });
    }


// else{
//     $("#result").empty();
// }

        
    


    };

$(document).on("click", "#result p", function()
{
    $("#result p").parents("#search-box").find('#search').val($(this).text());
    // $(this).parent("#result").empty();
});      
        


    

</script>

</body>
</head>

</html>