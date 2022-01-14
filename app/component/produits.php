
     <div class="content_dashboard">
         <div class="title">Admin / Produit</div>

         <div class="searchProduct">
            <form action="" method="post">
               <select name="" id="">
                  <option value="" selected disabled>Sélectionner une catégorie</option>
                  <option value="">Tableau</option>
                  <option value="">Chaise</option>
                  <option value="">Lit</option>
                  <option value="">Porte</option>
                  <option value="">Tiroir</option>
                  <option value="">Placard</option>
               </select>
               <input type="text" placeholder="prix">
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
                  <tr>
                     <td>Tableau</td>
                     <td>200</td>
                     <td>20</td>
                     <td>Tableau</td>
                     <td><img src="images/Table.jpg" alt="" width="40" height="40" srcset=""></td>
                     <td><a class="modifie" href="?produit&id_pro"><img src="images/update.png" width="30" height="30" alt="" srcset=""></a></td>
                     <td><a class="supprimer" href="?produit&id_delP"><img src="images/delete.png" width="30" height="30" alt="" srcset=""></a></td>
                  </tr>
                  <tr>
                     <td>Chaise</td>
                     <td>289</td>
                     <td>30</td>
                     <td>Chaise</td>
                     <td><img src="images/chaise.jpg" alt="" width="40" height="40" srcset=""></td>
                     <td><a class="modifie" href="?produit&id_pro"><img src="images/update.png" width="30" height="30" alt="" srcset=""></a></td>
                     <td><a class="supprimer" href="?produit&id_delP"><img src="images/delete.png" width="30" height="30" alt="" srcset=""></a></td>
                  </tr>
                  <tr>
                     <td>Porte</td>
                     <td>93</td>
                     <td>34</td>
                     <td>Porte</td>
                     <td><img src="images/porte.jpeg" alt="" width="40" height="40" srcset=""></td>
                     <td><a class="modifie" href="?produit&id_pro"><img src="images/update.png" width="30" height="30" alt="" srcset=""></a></td>
                     <td><a class="supprimer" href="?produit&id_delP"><img src="images/delete.png" width="30" height="30" alt="" srcset=""></a></td>
                  </tr>
                  <tr>
                     <td>Tiroir</td>
                     <td>38</td>
                     <td>98</td>
                     <td>Tiroir</td>
                     <td><img src="images/tiroir.jpg" alt="" width="40" height="40" srcset=""></td>
                     <td><a class="modifie" href="?produit&id_pro"><img src="images/update.png" width="30" height="30" alt="" srcset=""></a></td>
                     <td><a class="supprimer" href="?produit&id_delP"><img src="images/delete.png" width="30" height="30" alt="" srcset=""></a></td>
                  </tr>
                  <tr>
                     <td>Placard</td>
                     <td>938</td>
                     <td>23</td>
                     <td>Placard</td>
                     <td><img src="images/placard.jpg" alt="" width="40" height="40" srcset=""></td>
                     <td><a class="modifie" href="?produit&id_pro"><img src="images/update.png" width="30" height="30" alt="" srcset=""></a></td>
                     <td><a class="supprimer" href="?produit&id_delP"><img src="images/delete.png" width="30" height="30" alt="" srcset=""></a></td>
                  </tr>
                 
               </table>

               <!-- pagination -->

                <div class="pagination">
                   <nav>
                        <a href="?produit&page=prev"   <?php if(isset($_GET["page"]) && $_GET["page"]=='prev'){ echo 'style="background-color:#D57E7E;color: white;"'; } ?>>Avant</a>
                        <a href="?produit&page=1"  <?php if(isset($_GET["page"]) && $_GET["page"]==1){ echo 'style="background-color:#D57E7E;color: white;"'; } elseif(!isset($_GET["page"]) && empty($_GET["page"])){ echo 'style="background-color:#D57E7E;color: white;"';}?> >1</a>
                        <a href="?produit&page=2"   <?php if(isset($_GET["page"]) && $_GET["page"]==2){ echo 'style="background-color:#D57E7E;color: white;"'; } ?>>2</a>
                        <a href="?produit&page=3"   <?php if(isset($_GET["page"]) && $_GET["page"]==3){ echo 'style="background-color:#D57E7E;color: white;"'; } ?>>3</a>
                        <a href="?produit&page=next"   <?php if(isset($_GET["page"]) && $_GET["page"]=='next'){ echo 'style="background-color:#D57E7E;color: white;"'; } ?>>Après</a>
                   </nav>
                </div>

          </div>
     </div>






