<?php

    class View {
        
        function __construct() {
            
        }
        
        public function render($name) {
            require 'templates/header.php';
            require 'views/' . $name . '/index.php';
            require 'templates/footer.php';
        }
        
    }
?>