<?php

    if(isset($_POST['fid'])){
        $flight_id = $_POST['fid'];
        echo $flight_id;
    }else{
        echo "no volo selezionato";
    }

?>