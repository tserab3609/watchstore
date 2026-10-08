<?php

include('layouts/header.php');


?>



      <!--Home-->
    <section id="home">
        <div class="container">
        <button class="text-uppercase" onclick="openshop()">Shop Now</button>
        </div>

    </section>
    
      


      <script>
        function openshop(){
          window.open('shop.php','_blank');
        }
      </script>
<?php
  include('layouts/footer.php');
?>
   

