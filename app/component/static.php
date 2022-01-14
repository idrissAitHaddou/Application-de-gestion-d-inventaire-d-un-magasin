<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>
     <div class="content_statics">
         <div class="title">Admin / statistic</div>
          <div class="statics">
             <div class="content_statistic">
                <div><span>201</span><img src="images/produit.png" alt="" srcset=""></div>
                <div class="title_item">Produits</div>
             </div>
             <div class="content_statistic">
                <div><span>115</span><img src="images/client.png" alt="" srcset=""></div>
                <div class="title_item">Clients</div>
             </div>
             <div class="content_statistic">
                <div><span>78</span><img src="images/demande.png" alt="" srcset=""></div>
                <div class="title_item">Demandes</div>
             </div>
          </div>

     </div>

     <br><br><br><br><br>


     <canvas id="myChart" style="width:100%;max-width:700px;margin:auto;"></canvas>


     <br><br><br>

     <script>
                  
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                  labels: ['Tableau', 'Chaise', 'Lit', 'Porte', 'Tiroir', 'Placard'],
                  datasets: [{
                        label: 'Les produits',
                        data: [12, 19, 3, 5, 2, 3],
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
     </script>
</body>
</html>





