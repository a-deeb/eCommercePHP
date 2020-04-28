<?php

function reterPageStrSam($pageSize,$curPage,$countSql,$pagePara,$pageid)
{ 


       	 mysqli_query("SET NAMES 'utf8'"); 
	   	 $result = mysqli_query($countSql);
         $rsCount  = @mysqli_num_rows($result);
		 $pageCount=ceil($rsCount/$pageSize);
		
         if (!isset($curPage)) $curPage=1;
         if($curPage<=1) $curPage=1;
		  if(empty($curPage)) $curPage=1;

         if($curPage>=$pageCount) $curPage=$pageCount;
         $rsStart=(int)($curPage-1)*$pageSize;
		 if($rsStart<0)
		 {
		 	$rsStart = 0;
		 }
		if($curPage==0) $curPage=1;
         $pageStr=outPageListSam($pageCount,$curPage,$pagePara,$pageid);
         $outStr=$rsStart."||". $pageCount."||".$pageStr."||".$rsCount;
         return $outStr;
}
function outPageListSam($pageCount,$curPage,$pagePara,$pageid){ 
         $pageListNum=10;
         $step=5;
         $pageStr=""; 
         $prePage=$curPage-1;
         $nextPage=$curPage+1; 
         $pageFromNum=$curPage-$step;
         $pageToNum=$curPage+$step;
 	if($pageCount<$step){
          $pageFromNum=1;
          $pageToNum=$pageCount;
 	}else if($pageCount<$pageListNum){
          $pageFromNum=1;
          $pageToNum=$pageCount;
 	} else if ($pageToNum>$pageCount){ 
          $pageToNum=$pageCount;
             if(($pageToNum-$pageFromNum)<$pageListNum){
                      $pageFromNum=$pageToNum-$pageListNum+1;
             }
	}else{
            if($pageFromNum<1){
                       $pageFromNum=1;
                       $pageToNum=$curPage+$step-1;
            }
}

 $pageStr.=" 
    <li><a>共".$pageCount."页</a></li>";
  $curPage!=1?$pageStr.="<li><a href=?curPage=1&$pagePara&$pageid>首页</a></li><li><a href=?curPage=1&$pagePara&$pageid>上一页</a></li>":$pageStr.="<li><a href='javascript:void(0);'>首页</a></li><li><a href='javascript:void(0);'>上一页</a></li>";
 for($i=$pageFromNum;$i<=$pageToNum;$i++){
	$curPage==$i ? $pageStr.="<li class='active'><a>$i</a></li>" : 
	$pageStr.="<li><a href=?curPage=$i&$pagePara&$pageid>$i</a></li>";
  }  
	$curPage!=$pageCount ? $pageStr.="<li><a href=?curPage=$nextPage&$pagePara&$pageid>下一页</a></li><li><a href=?curPage=$pageCount&$pagePara&$pageid>尾页</a></li>" : 
	$pageStr.="<li><a href='javascript:void(0);'>下一页</a></li><li><a href='javascript:void(0);'>尾页</a></li>";
 $pageStr.="";


 return $pageStr;
}
?>