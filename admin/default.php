<?php
include_once("top.php");
?>
 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>
System Home</strong></div>  
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10"></td>
        <td valign="top">
Hello manager! Welcome to login <?php echo $title;?> background management system
          
          </td>
        <td width="10"></td>
      </tr>
    </table>
     </div>     
     </div>
    </div>
    

<?php
include_once("foot.php");
?>
 <script>
!function(){
laydate.skin('molv');
laydate({elem: '#Calendar'});
}();
 
</script>
</body>
</html>