<?php
    $con=mysqli_connect("divionline-sqldbserver.mysql.database.azure.com", "sqldbadmin@divionline-sqldbserver", "K@ntann@1234", "divionlinewpdb");
    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>