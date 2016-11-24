<?php
$db="test";
$table="user_log";
$fname= $_POST['fname'];
$fpass = $_POST['fpass'];

function parameterCreator()
{
    $generated="(";
    for($i=0; $i<func_num_args(); $i++)
    {
        if($i!=0)
            $generated.=",";

        if(is_string(func_get_arg($i))== true)
            $generated .= "'".func_get_arg($i)."'";
        else if(is_numeric(func_get_arg($i))==true)
            $generated .= func_get_arg($i);
    }
    $generated .= ")";
    return $generated;
}
$con = mysqli_connect('localhost','root','');
$db = mysqli_select_db($con,$db);
if($con)
{
    echo nl2br("\nConnected!");
    //$query = "INSERT INTO `user_log` (`username`, `password`) VALUES".parameterCreator($fname,$fpass);
    $query = "SELECT * FROM USER_LOG";
    $result= mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0)
    {
        echo nl2br("\n"."Succesful query!");
        while($a=mysqli_fetch_array($result))
            echo nl2br("Username: ".$a['username']." "."Password: ".$a['password']."\n");
    }
    else
        echo "No result! :(";

}else
{
    print("Not connected!");
}

