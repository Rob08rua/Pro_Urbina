<?php
    define("KEY_TOKEN","APR.wqc-354*");
    define("MONEDA","$");
   
    function validateEmail(email) {
        const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return regex.test(email);
    }

    
    
?>