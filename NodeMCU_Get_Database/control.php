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

    <div class="cards">
        <div class="card">
            <h2 class="head-box">LED 1</h2>
            <form action="updateDB.php" method="post" id="LED_ON1" onsubmit="myFunction()">
                <input type="hidden" name="ID" value="1"/>  
                <input type="hidden" name="Stat" value="1"/>  
                <input type="hidden" name="set" value="d0"/>
            </form>
            
            <form action="updateDB.php" method="post" id="LED_OFF1">
                <input type="hidden" name="ID" value="1"/>
                <input type="hidden" name="Stat" value="0"/>
                <input type="hidden" name="set" value="d0"/>
            </form>
            <ul class="bt">
                <li><button class="buttonON" name= "subject" type="submit" form="LED_ON1" value="SubmitLEDON" >LED ON</button></li>
                <li><button class="buttonOFF" name= "subject" type="submit" form="LED_OFF1" value="SubmitLEDOFF">LED OFF</button></li>
            </ul>
        </div>
        
        <div class="card">
            <h2 class="head-box">LED 2</h2>
            <form action="updateDB.php" method="post" id="LED_ON2" onsubmit="myFunction()">
                <input type="hidden" name="ID" value="1"/>  
                <input type="hidden" name="Stat" value="1"/>  
                <input type="hidden" name="set" value="d3"/>
            </form>
            
            <form action="updateDB.php" method="post" id="LED_OFF2">
                <input type="hidden" name="ID" value="1"/>
                <input type="hidden" name="Stat" value="0"/>
                <input type="hidden" name="set" value="d3"/>
            </form>
            <ul class="bt">
                <li><button class="buttonON" name= "subject" type="submit" form="LED_ON2" value="SubmitLEDON" >LED ON</button></li>
                <li><button class="buttonOFF" name= "subject" type="submit" form="LED_OFF2" value="SubmitLEDOFF">LED OFF</button></li>
            </ul>
        </div>
        
        <div class="card">
            <h2 class="head-box">LED 3</h2>
            <form action="updateDB.php" method="post" id="LED_ON3" onsubmit="myFunction()">
                <input type="hidden" name="ID" value="1"/>  
                <input type="hidden" name="Stat" value="1"/>  
                <input type="hidden" name="set" value="d4"/>
            </form>
            
            <form action="updateDB.php" method="post" id="LED_OFF3">
                <input type="hidden" name="ID" value="1"/>
                <input type="hidden" name="Stat" value="0"/>
                <input type="hidden" name="set" value="d4"/>
            </form>
            <ul class="bt">
                <li><button class="buttonON" name= "subject" type="submit" form="LED_ON3" value="SubmitLEDON" >LED ON</button></li>
                <li><button class="buttonOFF" name= "subject" type="submit" form="LED_OFF3" value="SubmitLEDOFF">LED OFF</button></li>
            </ul>
        </div>

        <div class="card">
            <h2 class="head-box">LED 4</h2>
            <form action="updateDB.php" method="post" id="LED_ON4" onsubmit="myFunction()">
                <input type="hidden" name="ID" value="2"/>  
                <input type="hidden" name="Stat" value="1"/>  
                <input type="hidden" name="set" value="d0"/>
            </form>
            
            <form action="updateDB.php" method="post" id="LED_OFF4">
                <input type="hidden" name="ID" value="2"/>
                <input type="hidden" name="Stat" value="0"/>
                <input type="hidden" name="set" value="d0"/>
            </form>
            <ul class="bt">
                <li><button class="buttonON" name= "subject" type="submit" form="LED_ON4" value="SubmitLEDON" >LED ON</button></li>
                <li><button class="buttonOFF" name= "subject" type="submit" form="LED_OFF4" value="SubmitLEDOFF">LED OFF</button></li>
            </ul>
        </div>
        
        <div class="card">
            <h2 class="head-box">LED 5</h2>
            <form action="updateDB.php" method="post" id="LED_ON5" onsubmit="myFunction()">
                <input type="hidden" name="ID" value="2"/>  
                <input type="hidden" name="Stat" value="1"/>  
                <input type="hidden" name="set" value="d3"/>
            </form>
            
            <form action="updateDB.php" method="post" id="LED_OFF5">
                <input type="hidden" name="ID" value="2"/>
                <input type="hidden" name="Stat" value="0"/>
                <input type="hidden" name="set" value="d3"/>
            </form>
            <ul class="bt">
                <li><button class="buttonON" name= "subject" type="submit" form="LED_ON5" value="SubmitLEDON" >LED ON</button></li>
                <li><button class="buttonOFF" name= "subject" type="submit" form="LED_OFF5" value="SubmitLEDOFF">LED OFF</button></li>
            </ul>
        </div>
        
        <div class="card">
            <h2 class="head-box">LED 6</h2>
            <form action="updateDB.php" method="post" id="LED_ON6" onsubmit="myFunction()">
                <input type="hidden" name="ID" value="2"/>  
                <input type="hidden" name="Stat" value="1"/>  
                <input type="hidden" name="set" value="d4"/>
            </form>
            
            <form action="updateDB.php" method="post" id="LED_OFF6">
                <input type="hidden" name="ID" value="2"/>
                <input type="hidden" name="Stat" value="0"/>
                <input type="hidden" name="set" value="d4"/>
            </form>
            <ul class="bt">
                <li><button class="buttonON" name= "subject" type="submit" form="LED_ON6" value="SubmitLEDON" >LED ON</button></li>
                <li><button class="buttonOFF" name= "subject" type="submit" form="LED_OFF6" value="SubmitLEDOFF">LED OFF</button></li>
            </ul>
        </div>
    </div>
</body>
</html>