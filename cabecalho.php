<div style="display: flex; justify-content: space-between; padding: 20px; border-bottom:1px solid black">
    <img src="../escambo_logo.jpeg" alt="" width="100px">
    <?php
        if(isset($nome)){
            echo "<h2>Bem vindo $nome!</h2>";
        }

        if(isset($titulo)){
            echo "<h2>$titulo</h2>";
        }
    ?>
    <h2>Escambo DAW</h2>

</div>
