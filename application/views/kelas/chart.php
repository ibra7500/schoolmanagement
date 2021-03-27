<div class="container">
    <h2 class="text-center mt-5">Perbandingan Jumlah Kelas</h2>
    <div id="graph"></div>
    <script src="<?php echo base_url().'assets/js/Chart.js'?>"></script>
    <canvas id="myChart"></canvas>

     <?php
    //Inisialisasi nilai variabel awal
    $kls= '';
    $jumlah=null;
    foreach ($hasil as $item)
    {
        $klas=$item->id_kelas;
        $kls .= "'$klas'". ", ";
        $jum=$item->total;
        $jumlah .= "$jum". ", ";
    }
    ?>
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $kls; ?>],
            datasets: [{
                label:'Jumlah Siswa',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
    </script>

  </body>
</html>