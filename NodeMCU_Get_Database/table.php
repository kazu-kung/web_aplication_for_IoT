<?php
    //header("Content-Type: application/json");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "temphumidnew";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $a = $conn->query("SELECT * FROM dht11 order by ID desc limit 20");
    $row = $a->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
        <a href="main.php" class="logo"><h2>ESPConnector</h2></a>
        <nav>
            <ul class="nav__links">
                <li><a href="table.php">Table</a></li>
                <li><a href="control.php">Controller</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>

    <div class="table-data">
        <div>
            <canvas id='myChart'></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        <form method="post">
        <input type="submit" name="temperature"
                 value="temperature" />
          
        <input type="submit" name="humidity"
                 value="humidtity" />
        </form>
        <?php
        $n = "";
        $cdata = "humidity";
        // $humidd = "humidity";
        $tempp = "temperature";
        if(isset($_POST['humidtity'])) {
            $cdata = $humidd;
        }
        if(isset($_POST['temperature'])) {
           $cdata = $tempp;
        }
        ?>

        <script>
            const ctx = document.getElementById('myChart');
      
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php  
                    
                    
                    while($row = $a->fetch_assoc()){
                        $data = $row['date'];
                        ?>"<?php echo $data; ?>", <?php } $a = $conn->query("SELECT * FROM dht11 order by ID desc limit 20"); 
                        ?>],
                    datasets: [{
                        label:"<?php echo $cdata;?>",
                        data: [<?php  
                        
                        
                        
                        while($row = $a->fetch_assoc()){
                            $datac = $row[$cdata]; echo $datac; ?>,
                            <?php } $a = $conn->query("SELECT * FROM dht11 order by ID desc limit 20"); ?>],
                        borderWidth: 1,
    //                     backgroundColor: [
    //                         'rgb(255, 99, 132)',
    //                         'rgb(54, 162, 235)',
    //   '                      rgb(000, 205, 86)']
                        }
                    ]
                },
                options: {
                    animations: {
                        tension: {
                            duration: 1000,
                            easing: 'linear',
                            from: 1,
                            to: 0,
                            loop: true
                        }
                    },
                    scales: {
                        y: {
                            beginzero: false,
                            suggestedMin: 25,
                            suggestedMax: 80,
                            position: 'right'
                        },
                        scaleShowValues: true,
                        xAxes: [{
                            type: 'time',
                            time: {
                                unit: 'day'
                                // format: "HH:mm:ss",
                                // unit: "hours",
                                // unitStepSize: 1,
                                // displaFormats: {
                                //     'minute': 'HH:mm',
                                //     'hour': 'HH:mm',
                                //     min: '00:00',
                                //     max: '23:59'
                                // }
                            }
                        }]
                    }
                }
            });
        </script>
    </div>
</body>
</html>