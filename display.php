<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="display.css">
    <title>Table de multiplication </title>
</head>

<body>
    <div class="container">
        <?php
                $indexModif = $_POST["i"];
                $indexSuppr = $_GET["index"];
                $aModif = $_POST["aMod"];
                $bModif = $_POST["bMod"];
               
                $a = $_POST["a"];
                $b = $_POST["b"];
                
                if($a && $b)
                {
                    session_start();
                    $_SESSION['a'] = $a;
                    $_SESSION['b'] = $b;
                    
                }

                if($indexSuppr!='')
                {
                    session_start();
                    
                    $tabA = $_SESSION['tabAKey'][0];
                    $tabB = $_SESSION['tabBKey'][0];

                    array_splice($tabA,$indexSuppr,1);
                    array_splice($tabB,$indexSuppr,1);

                    $b = $_SESSION['b'] - 1;

                    $_SESSION['b'] = $b;
                    
                    $_SESSION['tabAKey'] = array($tabA);
                    $_SESSION['tabBKey'] = array($tabB);
                }

                else if($indexModif!='')
                {
                    session_start();
                    
                    $tabA = $_SESSION['tabAKey'][0];
                    $tabB = $_SESSION['tabBKey'][0];
                    
                    $tabA[$indexModif] = $aModif;
                    $tabB[$indexModif] = $bModif;

                    $_SESSION['tabAKey'] = array($tabA);
                    $_SESSION['tabBKey'] = array($tabB);
                }
                
                else
                {
                    for($i = 0; $i < $b; $i++){
                        $tabA[$i] = $a;
                        $tabB[$i] = $i+1;
                    }

                    session_start();

                    $_SESSION['tabAKey'] = array($tabA);
                    $_SESSION['tabBKey'] = array($tabB);
                }
            ?>
        <table>
            <tr>
                <td>Valeur de A</td>
                <td>Valeur de B</td>
                <td>Resultat</td>
                <td>Action</td>
            </tr>
            <?php
                for($i = 0; $i < $b; $i++)
                {
                    $resultat = $tabA[$i] * $tabB[$i];
                    $class = $i%2== 0?'paire':'impaire';
                    echo "<tr class=\"$class\">
                                <td>$tabA[$i]</td>
                                <td>$tabB[$i]</td>
                                <td>$resultat</td>
                                <td>
                                    <div class=\"container-link\">
                                        <a href=\"http://www.monsite.com/devoir_php/modification.php?i=$i&a=$tabA[$i]&b=$tabB[$i]\"><button>modifier</button></a>
                                        <a href=\"http://www.monsite.com/devoir_php/display.php?index=$i\" class=\"supp\">supprimer</a>
                                    </div>
                                </td>
                            </tr>";
                }
                if($b <= 0){
                    echo "<tr>
                        <td>None</td>
                        <td>None</td>
                        <td>None</td>
                        <td style=\"padding:0px 50px;\">None</td>
                    </tr>";
                }
            ?>
        </table>
    </div>
</body>

</html>