<?php

    require_once '../app/classes/produit.php';
    $produit=new Produit();



   /*
   *
   *   make pagination
   * 
   */

    $rowsProduit=$produit->getNumberProduit();
    $numberPages=5;
    $rows=ceil($rowsProduit/$numberPages);
 
    if(isset($_GET["page"]) && !empty($_GET["page"]) && $_GET["page"]=="prev"){

       if($_SESSION["page"]>0){
         $_SESSION["page"]=$_SESSION["page"]-1;
         $prevVal=$_SESSION["page"];
         $start_position=($prevVal)*$numberPages;
         $dataProduit=$produit->getAllProducts($start_position,$numberPages);
       }else{
         $dataProduit=$produit->getAllProducts(0,$numberPages);
       }
      
    }
    elseif(isset($_GET["page"]) && !empty($_GET["page"]) && $_GET["page"]=="next"){

      if($_SESSION["page"]<$rows){
         $_SESSION["page"]=$_SESSION["page"]+1;
         $nextVal=$_SESSION["page"];
         $start_position=($nextVal-1)*$numberPages;
         $dataProduit=$produit->getAllProducts($start_position,$numberPages);
       }else{
         $nextVal=$_SESSION["page"];
         $start_position=($nextVal-1)*$numberPages;
         $dataProduit=$produit->getAllProducts($start_position,$numberPages);
       }
     
   }
    elseif(!empty($_GET["page"]) && isset($_GET["page"])){
      $_SESSION["page"]=$_GET["page"];
      $start_position=($_GET["page"]-1)*$numberPages;
      $dataProduit=$produit->getAllProducts($start_position,$numberPages);
    }else{
      $dataProduit=$produit->getAllProducts(0,$numberPages);
    }



      /*
      *
      *   search with category and nom 
      * 
      */


      $getInfoProducts=0;
      if($_SERVER["REQUEST_METHOD"]=="POST"){
          if(!empty($_POST['prixP'])  &&  empty($_POST['categoryP'])){
            $getInfoProducts=$produit->searchProducts("",$_POST['prixP']);
          }elseif(!empty($_POST['categoryP']) && empty($_POST['prixP'])){
            $getInfoProducts=$produit->searchProducts($_POST['categoryP'],"");
          }elseif(!empty($_POST['prixP']) && !empty($_POST['categoryP'])){
            $getInfoProducts=$produit->searchProducts($_POST['categoryP'],$_POST['prixP']);
          }else{
            $getInfoProducts=$produit->getAllProducts(0,$numberPages);
          }
      }



    


?>


      



     <div class="content_dashboard">
         <div class="title">Admin / Produit</div>

         <div class="searchProduct">
            <form action="" method="POST">
               <select name="categoryP">
                  <option value="" selected disabled>Sélectionner une catégorie</option>
                  <option value="Tableau">Tableau</option>
                  <option value="Chaise">Chaise</option>
                  <option value="Lit">Lit</option>
                  <option value="Porte">Porte</option>
                  <option value="Tiroir">Tiroir</option>
                  <option value="Placard">Placard</option>
               </select>
               <input type="text" placeholder="prix" name="prixP">
               <input type="submit" value="recherche">
            </form>
         </div>
         
        
          <div class="produit_content">

               <table>
                  <tr>
                     <th>Nom</th>
                     <th>Prix</th>
                     <th>Favoris</th>
                     <th>Marque</th>
                     <th>Image</th>
                     <th colspan="2">Action</th>
                  </tr>

                  <?php if($getInfoProducts==0){ foreach($dataProduit  as $data){  ?>
                  <tr>

                     <td><?php echo $data["nom"] ?></td>
                     <td><?php echo $data["prix"] ?></td>
                     <td><?php echo $data["nb_favouri"] ?></td>
                     <td><?php echo $data["mark"] ?></td>
                     <td><img src=<?php if(!empty($data["image"])){echo "upload/".$data["image"];}else{echo "images/"."ourLogo.svg";}  ?> alt="" width="40" height="40" srcset=""></td>
                     <td><a class="modifie" href=<?php echo "?produit&id_pro=".$data["id"] ?> ><img src="images/update.png" width="30" height="30" alt="" srcset=""></a></td>
                     <td><button  onclick="del(<?php echo $data['id'] ?>)" class="supprimer" style="cursor:pointer;"><img src="images/delete.png" width="30" height="30" alt="" srcset=""></button></td>
                     
                     <div hidden class="action-produit" id=<?php echo 'action'.$data['id'] ; ?> >
                        <div class="alertDelete">
                           <h2>Voulez-vous supprimer ce produit ?</h2>
                           <br><br>
                           <input type='submit' onclick="delPro(<?php echo $data['id'] ?>)" value='supprimer' style='background-color:red;'>
                           <input hidden type="text" class=<?php echo "val-pro".$data["id"];  ?> value= <?php echo $data["id"] ; ?> >
                           <input class="annuler-pro" type='button' value='annuler' style='background-color:#8833FF;'>
                        </div>
                         
                        <div hidden class="isdeleted">
                           <h2>Ce produit est supprimé</h2>
                           <input class="annuler-pro" type='button' value='annuler' style='background-color:#8833FF;'>
                        </div>

                        <div hidden class="isNotdeleted">
                           <h2  >Réessayez votre opération</h2>
                           <input class="annuler-pro" type='button' value='annuler' style='background-color:#8833FF;'>
                        </div>

                     </div>

                  </tr>
                  <?php }}  elseif($getInfoProducts){ foreach($getInfoProducts  as $dataSearch){  ?>
                     <tr>
                        <td><?php echo $dataSearch["nom"]  ?></td>
                        <td><?php echo $dataSearch["prix"]  ?></td>
                        <td><?php echo $dataSearch["nb_favouri"]  ?></td>
                        <td><?php echo $dataSearch["mark"]  ?></td>
                        <td><img src=<?php if(!empty($dataSearch["image"])){echo "upload/".$dataSearch["image"];}else{echo "images/"."ourLogo.svg";}  ?> alt="" width="40" height="40" srcset=""></td>
                        <td><a class="modifie" href= <?php echo "?produit&id_pro=".$dataSearch["id"] ?> ><img src="images/update.png" width="30" height="30" alt="" srcset=""></a></td>
                        <td><button  onclick="del(<?php echo $dataSearch['id'] ?>)" class="supprimer" style="cursor:pointer;"><img src="images/delete.png" width="30" height="30" alt="" srcset=""></button></td>


                        <div hidden class="action-produit" id=<?php echo 'action'.$dataSearch['id'] ; ?> >
                        <div class="alertDelete">
                           <h2>Voulez-vous supprimer ce produit ?</h2>
                           <br><br>
                           <input type='submit' onclick="delPro(<?php echo $dataSearch['id'] ?>)" value='supprimer' style='background-color:red;'>
                           <input hidden type="text" class=<?php echo "val-pro".$dataSearch["id"];  ?> value= <?php echo $dataSearch["id"] ; ?> >
                           <input class="annuler-pro" type='button' value='annuler' style='background-color:#8833FF;'>
                        </div>
                         
                        <div hidden class="isdeleted">
                           <h2  >Ce produit est supprimé</h2>
                           <input class="annuler-pro" type='button' value='annuler' style='background-color:#8833FF;'>
                        </div>

                        <div hidden class="isNotdeleted">
                           <h2  >Réessayez votre opération</h2>
                           <input class="annuler-pro" type='button' value='annuler' style='background-color:#8833FF;'>
                        </div>

                     </div>



                     </tr>

                  <?php }} ?>
                
                 
                 
               </table>


               <!-- pagination -->

               <?php if(empty($_POST['categoryP']) && empty($_POST['prixP'])){ ?>

                     <div class="pagination">
                        <nav>
                              <a href="?produit&page=prev"   <?php if(isset($_GET["page"]) && $_GET["page"]=='prev'){ echo 'style="background-color:#D57E7E;color: white;"'; } ?>>Avant</a>
                              <?php for($i=1;$i<=$rows;$i++){ ?>

                                 <a href=<?php  echo "?produit&page=".$i; ?>  <?php if(isset($_GET["page"]) && $_GET["page"]==$i){ echo 'style="background-color:#D57E7E;color: white;"'; } else{ echo 'style="background-color:white;color: balck;"';}?> ><?php  echo $i; ?></a>

                           <?php } ?>
                              <a href="?produit&page=next"   <?php if(isset($_GET["page"]) && $_GET["page"]=='next'){ echo 'style="background-color:#D57E7E;color: white;"'; } ?>>Après</a>
                        </nav>
                     </div>

                <?php } ?>

          </div>
     </div>
