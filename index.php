<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería Vicent Smith</title>
    <link rel="stylesheet" href="recursos/estilo.css">
</head>

<body>
    <style>
    .imga{
        border: 2px solid black;
        border-radius: 5px;
        width: 300px; 
        height: 150px;
        margin-top:15%;
    }
    </style>
    <header>
        <h1 class="titulo">Galería</h1>
        <div id="search">
        <form action=buscar.php method=post>
            <input type="text" placeholder="Buscar" name="buscar">
            <button type="submit">Buscar</button>
        </form>
    </div>
    </header>
    <div class="contenedor">
        <section>
        <?php 
include("con.php");
if($_GET["o"]=="ok"){
    echo '<script type="text/javascript">';
    echo 'window.alert("Su cuenta esta siendo verificada, tendrá acceso en breves");';
    echo '</script>';
}
$SQL ="SELECT * FROM publicaciones ORDER BY RAND()";
    $RS=mysqli_query($con,$SQL);
    $RS = mysqli_query($con, $SQL);
    echo '<table align=center>';
    $contador = 0;
    
        while ($fila = mysqli_fetch_assoc($RS)) {
            if ($contador % 3 == 0) { 
                echo '<tr>';
            }
    
            echo '<td><a href="detalle.php?id='.$fila['ID_Publicación'].'"><img class="imga" src="' . $fila['Imagen'] . '" alt="Imagen"></a></td>';
    
            $contador++;
    
            if ($contador % 3 == 0) { 
                echo '</tr>';
            }
        }
    
        if ($contador % 3 != 0) { 
            echo '</tr>';
        }
    
        echo '</table>';
    
    echo "</tr>";
    echo "</table><br><br>";
?>

        </section>
        <aside>
            <?php if($_SESSION["usuario"]==""){echo "
                <p>¿Quieres subir tu arte y compartirlo con el mundo?</p>
                <a href='registrar.php'>Crea Tu Usuario</a>
                <p>¿Ya tienes una cuenta?</p>
                <a href='perfil.php'>Inicia Sesión</a>";
            } elseif($_SESSION["tipo"]!="USER") {echo "<br><br><br><br><br><br>
                <p>Hola ".$_SESSION["usuario"]."<br>¿Quiéres ir a tu perfil? </p>
                <a href='perfil.php'>Ir al Perfil</a>";
            }else{echo "<br><br><br><br><br><br><p>Hola ".$_SESSION["usuario"]."<br>Esperemos que te guste nuestra galería </p>";}
            ?>
        </aside>
    </div>
    <footer>
    <p>Galería Vicent Smith™</p>
    </footer>

</body>

</html>
