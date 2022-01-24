<?php

    require_once '../app/classes/client.php';
    require_once '../app/classes/demand.php';
    require_once '../app/classes/produit.php';

    $client=new User();
    $rowsClient=$client->getNumberUsers();

    $demand=new Demand();
    $rowsDemand=$demand->getNumberDemand();

    $produit=new Produit();
    $rowsProduit=$produit->getNumberProduit();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="jquery/jquery.3.5.1.js"></script>
</head>
<body>
     <div class="content_statics">
         <div class="title">Admin / statistic</div>
          <div class="statics">
             <div class="content_statistic">
                <div><span><?php echo $rowsProduit; ?></span><img src="images/produit.png" alt="" srcset=""></div>
                <div class="title_item">Produits</div>
             </div>
             <div class="content_statistic">
                <div><span><?php echo $rowsClient; ?></span><img src="images/client.png" alt="" srcset=""></div>
                <div class="title_item">Clients</div>
             </div>
             <div class="content_statistic">
                <div><span><?php echo $rowsDemand; ?></span><img src="images/demande.png" alt="" srcset=""></div>
                <div class="title_item">Demandes</div>
             </div>
          </div>

     </div>

     <br><br><br><br><br>

     <canvas id="myChart" style="width:100%;max-width:700px;margin:auto;"></canvas>

     <br><br><br>

     <script>

$(function(){
          
            function getStatistic(){
                  $.ajax({
                        url:"../app/api/satatistic.php",
                        success:function(data)
                        {
                              const static=[];  
                              static[0]=parseInt(data[1]);
                              static[1]=parseInt(data[3]);
                              static[2]=parseInt(data[5]);
                              static[3]=parseInt(data[7]);
                              static[4]=parseInt(data[9]);
                              static[5]=parseInt(data[11]);
                              console.log(data);

                              // ----------------------------------

                                    const ctx =$('#myChart')[0].getContext('2d');

                                    console.log(static[0]);

                                    const myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                          labels: ['Tableau', 'Chaise', 'Lit', 'Porte', 'Tiroir', 'Placard'],
                                          datasets: [{
                                                label: 'Les produits',
                                                data: [static[0],static[1],static[2],static[3], static[4],static[5]],
                                                backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                          }]
                                    },
                                    options: {
                                          scales: {
                                                y: {
                                                beginAtZero: true
                                                }
                                          }
                                    }
                                    });

                              // ---------------------------------

                        },
                        error:function(){
                              console.log("error");
                        }
                  })
            }    
            getStatistic();  










})

















     </script>
</body>
</html>





