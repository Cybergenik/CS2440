<?php
    function hasher($u, $pass){
        $salt1 = hash("SHA512", $u);
        $salt2 = hash("SHA512", $u.$u);
        $hpass = $salt1.$pass.$salt2;
        $hpass = hash("SHA512", $hpass);
        return $hpass;
    }
?>