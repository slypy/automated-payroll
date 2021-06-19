<?php
function Error($message, $type){

    switch($type){
        case 'login':
            echo "<style> 
                    .usr1 {
                        border-color: red;
                    }

                    label{
                        color: red;
                    } 
                    </style>";

            echo "<span style='color:red; font-size: 0.85em;'>$message</span><br>"; 

            break;

        case 'signup-username':
            echo "<style> 
            #usr {
                border-color: red;
            }

            #usr + label{
                color: red;
            } 
            </style>";

            echo "<span style='color:red; font-size: 0.85em;'>$message</span><br>";
            break;

        case 'signup-email':
            echo "<style> 
            #email + label {
                border-color: red;
            }

            #usr label{
                color: red;
            } 
            </style>";

            echo "<span style='color:red; font-size: 0.85em;'>$message</span><br>";
            break;
    }
    
}
