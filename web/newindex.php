<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbstatus";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $a = $conn->query("SELECT * FROM `box_func` order by ID DESC");
    $icon = array("bi-lamp","bi bi-lamp-fill","bi-fan","bi-plug","bi-plug-fill","bi-brightness-high","bi-thermometer-low","bi-droplet");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IoT.net</title>
    <link rel="stylesheet" href="module/stylemode.css">
</head>

<body>
    <div class="header"><div class="logo">
    <img src="pic/IMG_2701.PNG"></div>
    </div>
    
    <div class="boxfixed">
        <img src="pic/1828817.png" onclick="openPopup()">
    </div>
        
    <div class="popup" id="popup">
        <h2>SETUP</h2>
        <div class="wrapper">
            <form action="module/insertcode.php" method="post" name="dataSet" class="formdata">
                <div class="input-data">
                    <input type="number" name="id" class="bn" required>
                    <label>ID</label>
                </div>
                <div class="input-data">
                    <input type="text" name="label" class="bn" required>
                    <label>Label</label>
                </div>
                <div class="input-data">
                    <input type="text" name="board" class="board" required>
                    <label>Board</label>
                </div>
                <div class="input-data">
                    <div class="select">
                        <select name="format" id="format" required>
                            <option selected disabled>Choose a type</option>
                            <option value="fan">Fan</option>
                            <option value="lamp">Lamp</option>
                            <option value="plug">Plug</option>
                            <option value="light">Light(Output)</option>
                            <option value="temp">Temperature(Output)</option>
                            <option value="hum">Humidity(Output)</option>
                        </select>
                    </div>
                </div>
                <div class="input-data">
                    <div class="select">
                        <select name="pin" id="pin" required>
                            <option selected disabled>Choose a pin</option>
                            <option value="d1">D1</option>
                            <option value="d2">D2</option>
                            <option value="d3">D3</option>
                            <option value="d4">D4</option>
                            <option value="d5">D5</option>
                            <option value="a1">A1</option>
                        </select>
                    </div>
                </div>
                <div class="radio-group">
                    <label class="radio">
                        <input type="radio" name="option" value="input">
                        Input
                        <span></span>
                    </label>
                    <label class="radio" id="rd1">
                        <input type="radio" name="option" value="output">
                        Output
                        <span></span>
                    </label>
                </div>
                <div class="button_pop">
                    <button type="submit" class="bt_1" name="insertdata">Add</button>
                    <button type="submit" class="bt_2" name="updatedata">Update</button>
                    <button type="submit" class="bt_3" name="deletedata">Delete</button>
                    <button type="button" class="bt_4" onclick="closePopup()">Close</button>
                    <hr>
                </div>
            </form>
        </div>
    </div>

    <div class="cards">

        <?php while($row = $a->fetch_assoc()){ $text = $row['board']; $pin = $row['pin'] ?>
            <?php $c = $conn->query("SELECT $pin FROM `command` WHERE board = '$text';"); if($row['IO'] == 'output'){ 
            $b = $conn->query("SELECT * FROM $text order by ID DESC limit 1"); } ?>
            <div class="card">
                <?php if($row['IO'] == 'input'){while($list = $c->fetch_assoc()){$state=$list[$pin];} ?>
                <form action="module/insertcode.php" method="post" name="dataSet">
                    <input type="hidden" name="board" value='<?php print $text ?>'/>
                    <input type="hidden" name="status" value='<?php print abs($state-1); ?>'/>
                    <input type="hidden" name="set" value='<?php print $pin ?>'/><?php } ?>
                    <button class="block" style="all:unset; width:100%;" name="subject" type="submit"><div class="icon">
                        <i class=<?php switch($row['type']){case 'lamp': if($state == 1){print "'main bi ".$icon[0]."'";}else{print "'main bi ".$icon[1]."'";} break; case 'fan': print "'main bi ".$icon[2]."'"; break; case 'plug': if($state == 1){print "'main bi ".$icon[3]."'";}else{print "'main bi ".$icon[4]."'";} break; case 'light': print "'main bi ".$icon[5]."'"; break; case 'temp': print "'main bi ".$icon[6]."'"; break; case 'hum': print "'main bi ".$icon[7]."'"; break;}?>></i>
                        <?php if($row['IO'] == 'input'){  
                        if($state == 1){ ?><i class="status bi bi-toggle-on"></i><?php }else{ ?><i class="status bi bi-toggle-off"></i><?php }}else{ ?>
                            <h1 id="temp"><?php if ($row['type'] == 'temp'){
                                while($rows = $b->fetch_assoc()){ echo $rows['temperature']; } ?>&deg;C</h1><?php }elseif($row['type'] == 'hum') {
                                while($rows = $b->fetch_assoc()){ echo $rows['humidity']; } ?>%</h1><?php }elseif($row['type'] == 'light') {
                                while($rows = $b->fetch_assoc()){ echo $rows['light']; } ?></h1><?php }else{}} ?>
                    </div>
                    <div class="head-box">
                        <h2><?php echo $row['label']; ?></h2>
                        <p><?php echo $row['type']; ?></p><p class="id_text"><?php echo $row['ID']; ?></p>
                    </div>
                                </button><?php if($row['IO'] == 'input'){ ?></form><?php } ?>
            </div>
        <?php } ?>
        
    </div>
    <script src="module/script.js"></script>
</body>
</html>