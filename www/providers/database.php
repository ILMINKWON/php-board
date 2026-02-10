<?php

if($connection = connect(...array_values('database'))){
    register_shutdown_function(function(){
        return close();
    });
    return $connection;
}