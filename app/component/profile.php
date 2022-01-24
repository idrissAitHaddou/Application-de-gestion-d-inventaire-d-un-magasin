
<?php

    require_once '../app/classes/admin.php';
    $admin=new Admin();
    /*
    *
    *   get admin
    * 
    */
    $adminInfo=$admin->getAdmin();

?>




   
<div class="content_dashboard">
      <div class="title">Admin / profile</div>
      <div class="errorPro"></div>

     <div style="text-align:center;width:100%;padding:10px;">
       <img src=<?php if(!empty($adminInfo["image"])){echo "upload/".$adminInfo["image"];}else{echo "images/"."clientLogo.png";}  ?> width="200" height="200" alt="" style="margin:auto;">
     </div>

      <form action="" method="post" class="form-ajouter form-admin">
         <input type="text" name="actiona" hidden value="updateProfile">
         <input type="text" placeholder="nom" name="nom" value= <?php echo $adminInfo["nom"]; ?> >
         <input type="text" placeholder="prenome" name="prenom" value="<?php echo $adminInfo["prenom"]; ?>"  >
         <input type="text" placeholder="email"  name="email" value= <?php echo $adminInfo["email"]; ?> >
         <input type="password" placeholder="old password" name="oldpassword" >
         <input type="password" placeholder="confirme password" name="newpassword" >
         <input type="text" placeholder="tel" name="tel" value= <?php echo $adminInfo["tel"]; ?> >
         <input type="button" value="telecharger image" id="btn-download-a">
         <input type="file" accept="image/*" name="image" hidden id="input-download-a">
         <?php if($adminInfo){ ?>
           <input type="submit" id="btn-ajouter" value="modifie">
         <?php } ?>
      </form>
      <br><br><br>
</div>
