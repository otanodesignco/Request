<?php

function isRequest($name,$type,$val = NULL)
{
    strtoupper($type); // convert type value to all uppercase for switch statement
    
    $returnVal; // create variable that is not initiated yet but holds boolean values casted as numerics
    
    switch($type) // check if $type is either get or post request types
    {
        case 'GET': // is get perform actions below
            
            if(isset($_GET[$name])) // if get super global has been give the array key of $name
            {
                if(!is_null($val)) //  get super global does have the array key of $name check if the value of $val is not empty; its not empty
                {
                    if($_GET[$name] == $val) // $val is not empty check if the value for the get super global matches $val; matches return 1 for true
                    {
                        $returnVal = 1;
                    }
                    else // doesn't match return 0 for false
                    {
                        $returnVal = 0; 
                    }
                } // value for $val is empty but get super global has an array key of $name; return 1 for true
                else
                {
                    $returnVal = 1;
                }
            } // get super global doesn't have an array key of
            else
            {
                $returnVal = 0;
            }
            
        break;
        
        case 'POST': // check if $type is post and perform actions below
        
            if(isset($_POST[$name])) // check if post super global has array key of $name; it does return 1 for true
            {
                
                $returnVal = 1;
            }
            else // it doesn't return 0 for false
            {
                $returnVal = 0; 
            }
                
        break;
        
        default: // $type value does not match our type list set $returnVal to 0 or false
            $returnVal = 0;
        break;
    }
    return $returnVal; // give response of boolean back from operation
}

function request($val,$rtntyp = false)
{
    $rtnVal;
        
    if(isset($_GET[$val]) && !empty($_GET[$val]))
    {
        switch($rtntyp)
        {
            case false:
                $rtnVal = $_GET[$val];
            break;
            
            case true:
                $rtnVal[0] = $_GET[$val];
                $rtnVal[1] = "GET";
            default:
                $rtnVal = $_GET[$val];
            break;
        }
    }
    elseif(isset($_POST[$val]) && !empty($_POST[$val]))
    {
        switch($rtntyp)
        {
            case false:
                $rtnVal = $_POST[$val];
            break;
            
            case true:
                $rtnVal[0] = $_POST[$val];
                $rtnVal[1] = "GET";
            default:
                $rtnVal = $_POST[$val];
            break;
        }
    }
    else
    {
        $rtnVal = NULL;
    }
        
    return $rtnVal;
}
?>