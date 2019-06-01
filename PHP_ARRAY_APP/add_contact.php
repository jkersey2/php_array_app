<?php

require_once('contact_functions.php'); 

session_start();

// we'll assume that the contacts have been stored in
// $_SESSION before this page is opened
$contacts = $_SESSION['contacts'];  // get contacts

if(isset($_POST['submit'])) { 
    createContact($contacts);
    $_SESSION['contacts'] = $contacts;     // add contacts to SESSION
}
?>

<?php include "includes/header.php"; ?>  <!-- header include file -->

    <div id="main">
        <h1>Add Contact Info</h1>
        <form action="add_contact.php" method="post" id="form1">

            <label>Group:</label>
            <select name="group_id">
                <option value="Family">Family</option>
                <option value="Friends">Friends</option>
                <option value="Work">work</option>
            </select> <br />

            <!-- the html5 placeholder attribute works with IE 10 and later 
                 and with pretty much any other recent browser -->
            <label>Name:</label>
            <input type="input" name="name" placeholder="type name"/> <br />

            <label>Phone:</label>
            <input type="input" name="phone" placeholder="phone"/> <br />
                
            <label>Email:</label>
            <input type="input" name="email" placeholder="email"/> <br /><br />

            <label>&nbsp;</label>
            <input type="submit" name="submit" value="Add Contact" /> <br />
        </form>
        
        <p> <a href="index.php">View Contacts</a> </p>
    </div> <!-- end main -->

<?php include "includes/footer.php"; ?>  <!-- footer include file -->