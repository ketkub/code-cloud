<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
    
</head>
<body>
<div><div class="container" style="max-width: 50%;">Search admin</div>
<div class="search-container"><br><br>
      <input type="text" style="max-width: 50%;" placeholder="Search products..." id="live_search" autocomplete="off"><br><br>
</div>
</div>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: whitesmoke;
  margin: 0;
  padding: 0;
}
.container {
  margin: 50px auto;
  padding: 20px;
  text-align: center;
  font-size: 5rem; /* เพิ่มขนาดตัวหนังสือ */
  font-family: "Times New Roman", Times, serif; /* ใช้รูปแบบตัวอักษรที่ดูหรู */
}

.search-container {
  text-align: center;
  margin-top: 20px;
}

input[type="text"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

</style>

<div id="searchresult"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
      $("#live_search").keyup(function(){

         var input = $(this).val();
         //alert(input);
         if(input != ""){
            $.ajax({
               url:"livesearch.php",
               method:"POST",
               data:{input:input},

               success:function(data){
                  $("#searchresult").html(data);
               }

            });
         }else{
            $("#searchresult").css("display","none");
         }

      });

   });
</script>
</body>
</html>