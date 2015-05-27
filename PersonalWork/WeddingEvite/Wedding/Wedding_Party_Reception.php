<?php
$EmailFrom = $_POST['EmailFrom'];
$LastName = trim($_POST['LastName']);
$Guest = trim($_POST['Guest']);
$Phone = trim($_POST['Phone']);
$Food = trim($_POST['Food']);
$Other = trim($_POST['Other']);


/// Validate
$message = "<h2>Error!</h2><h4>You need to fill in the following:</h4><ul>";
if($EmailFrom == ""){$message .= "<li><b>First Name</b> Not completed!"; $fail = "Y";}
if($LastName == ""){$message .= "<li><b>Last Name</b> Not completed!"; $fail = "Y";}
if($Phone == ""){$message .= "<li><b>Phone</b> Not completed!"; $fail = "Y";}
if($Food == ""){$message .= "<li><b>Chicken or Pork or Both?</b> Not completed!"; $fail = "Y";}

if($fail == "Y")
{
$message .= "</ul>";
include("MissingInfo.html");
die();
}
///

$EmailTo = "vm@victormorsedesign.com";
$Subject = "Wedding/Party/Reception"; /// Add a subject

$validationOK=true;
if (trim($EmailFrom)=="") $validationOK=false;
if (!$validationOK) {
  echo "Error! E-mail was not sent. Please check your code.";
  exit;
}


$Body = "";
$Body .= "First Name:\n$EmailFrom\n\n";
$Body .= "Last Name:\n$LastName\n\n";
$Body .= "Guest:\n$Guest\n\n";
$Body .= "Phone:\n$Phone\n\n";
$Body .= "Food:\n$Food\n\n";
$Body .= "Other:\n$Other\n\n";


if($Subject == NULL) {$Subject = "From $EmailFrom";}
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

$theResults = <<<EOD
<html>
<head>
<title>message sent</title>
<meta http-equiv="refresh" content="2;URL=http://www.victormorsedesign.com/Wedding/Wedding_Party_Reception.html">
<style type="text/css">
<!--
body {
	background-color: #000000;
	font-family: "Arial Black", Gadget, sans-serif;
	font-size:24px;
	font-weight:bold;
	color:#fcf02c;
	text-transform: capitalize;
	margin-left:25px;
	margin-right:25px;
	text-align: center;
	}
-->
</style>
</head>
<body
<div align="center">THANK YOU FOR RSVPING! WE LOOK FORWARD TO SEEING YOU AT THE EVENT!</div>
</body>
</html>
EOD;
echo "$theResults";
?>