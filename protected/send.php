<?


function func($str)
{
    $filter= $str;
    $filter=addslashes($filter);
    if (strstr(strtolower($filter),"char(")) $filter=str_replace("char(","",strtolower($filter));
    $filter=htmlspecialchars($filter);
    return $filter;
}

function func_no($str)
{
    $filter= $str;
    $filter=addslashes($filter);
    if (strstr(strtolower($filter),"char(")) $filter=str_replace("char(","",strtolower($filter));
    return $filter;
}

function func2($str)
{$str_new=stripslashes($str); return $str_new;}




?>

<script> alert ("<?=$msg?>");  </script>