<?php 

    function connection(){
        $servername ="localhost";
        $username ="id20757300_unachh";
        $password ="mike2928.A";

        $database ="id20757300_ulises";

        $connect = mysqli_connect($servername, $username, $password);

        mysqli_select_db($connect, $database);
        
        return $connect;
        
    };
    ?>