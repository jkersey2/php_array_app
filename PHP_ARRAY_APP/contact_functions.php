<?php

function deleteContact($index) {
    global $contacts; 
    unset($contacts[$index]);        // removes array element, but does not change indexes
    $contacts = array_values($contacts);    // re-order array indexes
    //array_splice($contacts, $_GET['delete'], 1);  // this would work too
}

function createContact( &$contacts ) {
    if(!empty($_POST['name'])) 
        $n = $_POST['name'];
    else
        $n = NULL;
	   
    if(!empty($_POST['phone'])) 
        $p = $_POST['phone'];
    else
        $p = NULL;
	   
    if(!empty($_POST['email'])) 
        $e = $_POST['email'];
    else
        $e = NULL;
	   
   $g = $_POST['group_id'];  // select value will not be empty

    // add contact info to array
    $contacts[] = array('name'=>$n, 'phone'=>$p, 'email'=>$e, 'group'=>$g);  
}

function createContactList() {
    global $contacts;
    // original contact list, should be in a database
    $contacts[] = array('name' =>"joe", 'phone' => "555-1111", 'email'=>"joe1@xyz.com", 'group'=>"Friends");
    $contacts[] = array('name' =>"sue", 'phone' => "555-2222", 'email'=>"sue2@xyz.com", 'group'=>"Friends");
    $contacts[] = array('name' =>"jim", 'phone' => "555-3333", 'email'=>"jim3@xyz.com", 'group'=>"Work");
    $contacts[] = array('name' =>"jan", 'phone' => "555-4444", 'email'=>"jan4@xyz.com", 'group'=>"Friends");
    $contacts[] = array('name' =>"tia", 'phone' => "555-5555", 'email'=>"tia5@xyz.com", 'group'=>"Family");
    $contacts[] = array('name' =>"bob", 'phone' => "555-6666", 'email'=>"bob6@xyz.com", 'group'=>"Friends");
    $contacts[] = array('name' =>"sam", 'phone' => "555-7777", 'email'=>"sam7@xyz.com", 'group'=>"Work");
    $contacts[] = array('name' =>"lou", 'phone' => "555-8888", 'email'=>"lou8@xyz.com", 'group'=>"Family");
    $contacts[] = array('name' =>"zoe", 'phone' => "555-9999", 'email'=>"zoe9@xyz.com", 'group'=>"Work");
    $contacts[] = array('name' =>"abe", 'phone' => "555-1010", 'email'=>"abe10@xyz.com", 'group'=>"Family");
}

?>