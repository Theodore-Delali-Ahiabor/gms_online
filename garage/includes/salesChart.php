<?php 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }

  $conn = $pdo->open();
?>
<!-- Chart Data -->
<?php
  $months = array();
  $sales = array();
  for( $m = 1; $m <= 12; $m++ ) {
    try{
      $stmt = $conn->prepare("SELECT * FROM `sales` WHERE MONTH(`Date`)=:month AND YEAR(`Date`)=:year");
      $stmt->execute(['month'=>$m, 'year'=>$year]);
      $total = 0;
      foreach($stmt as $srow){
        $total += $srow['Total'];    
      }
      array_push($sales, round($total, 2));
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }

    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $sales = json_encode($sales);
  $year = json_encode($year);

?>
<!-- End Chart Data -->

<?php $pdo->close(); ?>

<canvas id="myChart" width="400" height="135" ></canvas>
<script src="../assets/chartjs/dist/chart.js"></script>
<script src="../assets/chart.js-3.8.0/package/dist/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo $months; ?>,
        datasets: [{
            label: <?php echo $year; ?> + ' Sales GHC',
            data: <?php echo $sales; ?>,
            backgroundColor: [
                'rgba(235, 99, 132, 0.2)',
                'rgba(34, 162, 235, 0.2)',
                'rgba(235, 206, 86, 0.2)',
                'rgba(55, 192, 192, 0.2)',
                'rgba(133, 102, 255, 0.2)',
                'rgba(235, 159, 64, 0.2)',
                'rgba(255, 119, 132, 0.2)',
                'rgba(54, 182, 235, 0.2)',
                'rgba(255, 226, 86, 0.2)',
                'rgba(75, 212, 192, 0.2)',
                'rgba(153, 122, 255, 0.2)',
                'rgba(255, 179, 64, 0.2)',
            ],
            borderColor: [
                'rgba(235, 99, 132, 1)',
                'rgba(34, 162, 235, 1)',
                'rgba(235, 206, 86, 1)',
                'rgba(55, 192, 192, 1)',
                'rgba(133, 102, 255, 1)',
                'rgba(235, 159, 64, 1)',
                'rgba(255, 119, 132, 1)',
                'rgba(54, 182, 235, 1)',
                'rgba(255, 226, 86, 1)',
                'rgba(75, 212, 192, 1)',
                'rgba(153, 122, 255, 1)',
                'rgba(255, 179, 64, 1)',
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
