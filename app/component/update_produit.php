<?php

    require_once '../app/classes/produit.php';
    $produit=new Produit();



   /*
   *
   *   get product
   * 
   */

    $produitInfo=$produit->getProduct($_GET["id_pro"]);
    
?>
   


<div class="content_dashboard">

      <div class="title">Admin / Modifier un produit</div>
      <div class="errorPro"></div>

      <form action="" method="post" class="form-ajouter form-update">
         <input type="text" name="id_pro" hidden value=<?php echo $_GET["id_pro"]; ?>>
         <input type="text" name="action" hidden value="updateProduct">
         <input type="text" name="nom" placeholder="nom" value=<?php echo $produitInfo["nom"]; ?> >
         <input type="number" step="any"  name="prix" placeholder="prix" value=<?php echo $produitInfo["prix"]; ?> >
         <select name="category" id="">
            <option value="Tableau" <?php if($produitInfo["mark"]=="Tableau"){echo "selected";} ?> >Tableau</option>
            <option value="Chaise" <?php if($produitInfo["mark"]=="Chaise"){echo "selected";} ?> >Chaise</option>
            <option value="Lit" <?php if($produitInfo["mark"]=="Lit"){echo "selected";} ?> >Lit</option>
            <option value="Porte" <?php if($produitInfo["mark"]=="Porte"){echo "selected";} ?> >Porte</option>
            <option value="Tiroir" <?php if($produitInfo["mark"]=="Tiroir"){echo "selected";} ?> >Tiroir</option>
            <option value="Placard" <?php if($produitInfo["mark"]=="Placard"){echo "selected";} ?> >Placard</option>
         </select>
         <textarea name="description" id="" placeholder="descritpion"><?php echo $produitInfo["description"]; ?></textarea>
         <input type="button" value="Télecharger image" id="btn-download">
         <input type="file" accept="image/*" name="image" hidden id="input-download">
         <?php if($produitInfo){ ?>
            <input type="submit" id="btn-Ajouter" value="Modifier">
         <?php } ?>
         
      </form>

</div>
