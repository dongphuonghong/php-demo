<?php
class page{
function findPage($count,$limit){
$page=(($count%$limit)==0?$count/$limit:ceil);
return $page;
}//end findPage
function findStart($limit){
            if(!isset($_GET['page'])||$_GET['page']==1)
$start=0;
}//end if
else{
                $start=($_GET['page']-1)*$limit;
}//end else
return $start;
}//end findStart
}//end class
?>