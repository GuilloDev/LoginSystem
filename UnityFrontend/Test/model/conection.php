<?php
    class connect{
        public static function conn(){
            $host = "127.0.0.1";
            $user = "root";
            $pass = "";
            $db = "quasartest";
            
            $conexion = mysqli_connect($host, $user, $pass, $db);
            return $conexion;
        }

        public static function close($conexion){
            mysqli_close($conexion);
        }
    }
