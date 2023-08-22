<style>
@keyframes FadeCheckOut {
  from {
    width:0px;
  }
  to {
    width:500px
  }
}
@keyframes RetrieveCheckout {
  from {
    width: 500px;
  }
  to {
    width:0px;
  }
}

.delete:hover {
  cursor: pointer;
}
.default{
   visibility:hidden
}

.default .emptycart{
  dispay:none
}

.default .cartitem {
    display:none
}
.default .title {
    display:none
}
.default .validerpanier{
  display:none
}

.default .prix{
  display:none
}


.cartitem{
  display:flex; flex-direction:row;justify-content:space-between; align-items:center ;width: 100%; margin-top:50px ;  height:100px;

}
.menuNotDisplayed{
  background-color: black;
  height:80%;
  animation: RetrieveCheckout 1.5s forwards ease;
}
.menuNotDisplayed .cartitem{
  display:none
}

.menuNotDisplayed .prix{
  display:none
}

.menuNotDisplayed .empty{
  dispay:none
}

.menuNotDisplayed .validerpanier{
  display:none
}

.menuNotDisplayed .title{
  display:none
}

#quantity:focus{
   outline:none;
}

#quantity {
  border:1px solid rgb(9, 142, 230);
  height:50px; 
  width:70px; 
  border-radius:6px
}

.menuNotDisplayed .has-scrollbar{
   display:none
}

.default .has-scrollbar{
   display:none
}
 
.checkoutcontainer{
  height:80%;
  background-color: black;
  animation: FadeCheckOut 1.5s forwards ease;
  
}
</style>


<div style="z-index:20; position:fixed"> 
<div style='z-index: 10; box-shadow: 2px 2px 2px -3px rgba(0, 0, 0, 0.4); overflow:scroll; color:black; background-color:white ; position:fixed;top:100px ;display:flex; flex-direction:column;justify-content:space-between; align-items:center ;' id='checkoutcont' class='default'>
    <h3 class='title'>   
        Mon panier
    </h3> 


    <div style=''>
    <?php
     
     $price = 0;

      require_once('../Controllers/CartItemDetailController.php');

      if(isset($_SESSION['cart'])){

        foreach($_SESSION['cart'] as $key =>  $cartItem){
          echo '

          <div class="cartitem">  

            <img style="width:45%; height:150px" src="./assets/images/'.CartItemDetailController::cartDetail($key)['myimage'].'" loading="lazy"/>

            <div style="display:flex; flex-direction:column;justify-content:space-around; align-items:center ; height:100% ; width: 100%"> 
              <h5 class="title">   
                '.CartItemDetailController::cartDetail($key)['libelle'].'
              </h5> 
              <div class="title">   
                  <input oninput="updateCart('.CartItemDetailController::cartDetail($key)['id'].' , quantite)" value="'.$cartItem.'" id="quantity" type="number" required/> 
              </div> 
              <h5 class="title">   
                '. number_format(CartItemDetailController::cartDetail($key)['prix']).' FCFA
              </h5> 
            </div>  

            <div onclick="deleteElementFromCart('.CartItemDetailController::cartDetail($key)['id'].')" class="delete" >
              <ion-icon style="font-size:25px" name="close-circle"></ion-icon>
            </div>
          </div> 

         

          ';

          $price += CartItemDetailController::cartDetail($key)['prix']*$cartItem;

        }
      } else {
        echo  '  ';
      }

    ?>
    </div>

  <div style='margin-top:50px;'>

  

    <?php

    if(isset($_SESSION['cart'])){
        echo ' 
        <div>
             
          <h3 class="prix">
              Total :  '. number_format($price).' FCFA
          </h3>

        </div>

        <button style="width:150px; height:50px; margin-bottom:20px; color:white; background-color:rgb(9, 142, 230) ; margin-top:50px" class="validerpanier">   
          Valider le panier
        </button>  
     ';
    }

    ?> 
  </div>

    

</div>
</div> 


<script>
  let quantite = document.getElementById('quantity').value

  function deleteElementFromCart(id){
    fetch(
            "DeleteFromCart.php", {
              method:"POST", 
              headers:{
                "Accept-Content":"application/json",
                "Content-Type":"application/json"
              } , 
              body:JSON.stringify({
                key:id,
              })
            }
          ).then(
             data => data.text()
          ).then(
            (data) => {
              if(data === 'Deleted'){
                window.location.replace('index.php');
              }
            }
    ); 
  }

  function validateInput() {
  
    const inputElement = document.getElementById('quantity');

    let inputValue = inputElement.value;
    console.log(inputValue);
  }

  function updateCart(id , quantite){
          fetch(
            "cart.php", {
              method:"POST", 
              headers:{
                "Accept-Content":"application/json",
                "Content-Type":"application/json"
              } , 
              body:JSON.stringify({
              idproduit:id,
              quantite:quantite,
              })
            }
          ).then(
             data => data.text()
          ).then(
           
            (data) => {
              console.log(data)
              if(data === 'Added'){
                 window.location.replace('index.php')
              }
            }
          ); 
  
  }



</script>
