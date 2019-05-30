<html>
    <h3>Quiz History</h3>
    <table border = "1">
    
    <?php
        $file = fopen("Homework3history.txt", "r") or die("File error");
        
        while(!feof($file)){ echo fgets($file)."<br>";}
        fclose($file);
    ?>
    </table>    
</html>