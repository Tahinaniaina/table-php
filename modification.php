<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Document</title>
</head>

<body>
    <?php
        $i = $_GET["i"];
        $a = $_GET["a"];
        $b = $_GET["b"];
        session_start();
        $A = $_SESSION["a"];
        $B = $_SESSION["b"];
    ?>
    <div class="divInput">
        <form action="http://www.monsite.com/devoir_php/display.php" method="post">
            <div class="text-container">
                <h1>Modification</h1>
                <p>Entrer la valeur du multiplicateur dans A et la valeur du multiplicande dans B</p>
            </div>
            <div class="input-container">
                <input type="number" name="aMod" min="0" id="a" value=<?php echo $a;?> required />
                <label for="a">A modifier</label>
            </div>
            <div class="input-container">
                <input type="number" name="bMod" min="1" id="b" value=<?php echo $b;?> required />
                <label for="b">B modifer</label>
            </div>
            <button type="submit">Valider</button>
            <input type="hidden" name="b" value=<?php echo $B;?>>
            <input type="hidden" name="a" value=<?php echo $A;?>>
            <input type="hidden" name="i" value=<?php echo $i;?>>
        </form>
    </div>

</body>

</html>