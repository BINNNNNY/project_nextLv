<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   
    <link rel="stylesheet" type="text/css" href="quiz01_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
      $(document).ready(function(){
        $('.carousel').carousel({
          interval: 2000 
        });
      });

      function searchProduct() {
          var searchText = document.getElementById('searchInput').value;
          console.log("Searching for:", searchText);
         
      }
      
     
    </script>

    <title></title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/headers.css">
    <link rel="stylesheet" type="text/css" href="./css/footers.css">
    <link rel="stylesheet" type="text/css" href="./css/features.css">
  </head>
  <body>
    <main>
    <?php include "header.php";?> <!-- 헤더 -->
    <?php include "main.php";?>   <!-- 메인 -->
    <?php include "footer.php";?> <!-- 푸터 -->
    </main>
  </body>
</html>
