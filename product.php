<?php
include('layouts/header.php');
include('server/connection.php');

if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];

     $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
     $stmt->bind_param("i",$product_id);

     $stmt->execute();


     $product = $stmt->get_result();





}else{
  header('location: index.php');
}





?>





<?php




?>

      <section class="single-product my-5 pt-5">
        <div class="row mt-5">

          <?php
            while($row = $product->fetch_assoc()){
          ?>

          

            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $row['product_image']; ?>" id="mainImg">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img" alt="">
                    </div>
                   
                </div>
            </div>

            

            <div class="col-lg-6 col-md-12 col-sm-12">
                
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2>Rs.<?php echo $row['product_price'];  ?></h2>

                <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" >
                  <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                  <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">

                      <input type="number" name="product_quantity" value="1"/>
                      <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>


                </form>
                
                <h4 class="mt-5 mb-5">Product Details</h4>
                <span><?php echo $row['product_description']; ?></span>
            </div>
           
            <?php  }  ?>
        </div>
      </section>

      
<?php
  include('layouts/footer.php');
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
      var mainImg = document.getElementById("mainImg");
      var smallImg = document.getElementsByClassName("small-img");

      for(let i=0;i<4;i++){
        smallImg[i].onclick = function(){
        mainImg.src = smallImg[i].src;
      }
      }

      
    

    </script>  

  </body>
</html>