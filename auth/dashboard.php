<?php
//include auth_session.php file on all user panel pages
require_once("adminFunction.php"); 

headers(); 
menus();
leftSidebar();
?>
 <div class="pageContent">
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now user dashboard page.</p>
    </div> 
</div>	
<?php footers(); ?>

