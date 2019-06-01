<?php



require_once('contact_functions.php'); 

session_start();

if (empty($_SESSION['contacts'])) {
    $contacts = array();
    createContactList();
    $_SESSION['contacts'] = $contacts;  // add array of contact objects to SESSION
} 
else {
    $contacts = $_SESSION['contacts'];  // retrieve array of contact objects
}

if(isset($_GET['delete'])) {
    $index = $_GET['delete'];     // index of item to delete
    deleteContact($index);
    $_SESSION['contacts'] = $contacts;      // store altered array to SESSION
}
?>

<?php include "includes/header.php"; ?>  <!-- header include file -->

    <div id="main">

        <h1>Select a Contact Category</h1>

        <div id="sidebar">
            
            <h2>Group</h2>
            <ul class="nav">   <!-- contact group list -->
                <li><a href="index.php?group=Family">Family</a></li>
		<li><a href="index.php?group=Friends">Friends</a></li>
                <li><a href="index.php?group=Work">Work</a></li>
            </ul>
        </div>  <!-- end id=sidebar -->

        <div id="content">
            
            <h2><?php if(isset($_GET['group'])) echo $_GET['group']; ?></h2>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                </tr>
                
            <?php 
            if(isset($_GET['group'])) {
				
		for($i = 0; $i < count($contacts); $i++) {  
  				  
                    if($contacts[$i]['group'] == $_GET['group'] ) {  		 
            ?> 
                    <tr>
                      <td><?php echo $contacts[$i]['name']; ?></td>
                      <td><?php echo $contacts[$i]['phone'];   ?></td>
                      <td><?php echo $contacts[$i]['email'];   ?></td>
                      <td><a href="<?php echo 'index.php?delete=' . $i; ?> ">delete</a></td>
                    </tr>
                
            <?php 
                    }
		}
            }
            ?>
              
            </table>
            <p><a href="add_contact.php">Add A Contact</a></p>
            <p>Total Contacts: <?php echo count($contacts); ?></p>
        </div> <!-- end id=content -->
    </div> <!-- end id=main -->

 <?php include "includes/footer.php"; ?>   <!-- footer include file -->
    
    
