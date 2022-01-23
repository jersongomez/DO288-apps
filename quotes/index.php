<?php
    print "This app returns a random funny quote.\n";
        if(isset($_ENV["HELLO_AUD"]) && $_ENV["HELLO_AUD"] != null) {
            print "{$_ENV["HELLO_AUD"]} Ingeniero.\n";
        } else {
            print "Hola Ingenieros. {$_ENV["HELLO_AUD"]} \n";
        }
        
?>
