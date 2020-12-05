<? include "../phplib/station.inc"; useSession(); ?>
<?
// viewnode.php3
//              
// part of the manifestation.com knowledge base
// Displays a node in the knowledge base tree
//
?>
<html>
<head>
<title>Resources</title>
<link href="/station.css" rel="stylesheet">
</head>
</html>
<body bgcolor="#ffffff">

<? msdc_toolbar(""); ?>

<? // default to top node.

   if ($nodeID == "") { $nodeID = 0; }

   $db = new msdc_DB;    
   $db->query("select * from kb_node where ID=$nodeID");

   if (! $db->next_record()) {

      print "Node not found.";

   } else {

      // first, show the path:


      $path = $db->Record["node"];

      # this may have to be patched if I ever want to do 2 trees..
      while ($db->Record["ID"]>0) {

          $db->query("select * from kb_node where ID=" . $db->Record["parentID"]);
	  if ($db->next_record()) {

            $path = "<a href=\"viewnode.php3?nodeID=" . $db->Record["ID"] . "\">"
            . $db->Record["node"] . "</a>/" . $path;
          }
      }
?> 

<!-- Node Path -->

<table width="590" align="center" cellspacing="0" cellpadding="2" border="0">
<tr><td align="left" bgcolor="#cccc99" class="msdcTool" colspan="2">
<? print $path; ?>
<?

    // now, show the subcategories

    $db->query("select * from kb_node where parentID=$nodeID order by node");
    while ($db->next_record()){

        print "<tr><td width=\"5\"><td><a href=\"viewnode.php3?nodeID=" . $db->Record["ID"] 
            . '">' . $db->Record["node"] . "</a>";
    }

?>
</table>

    <!-- documents in this node -->

<?  // finally, show any messages in this node


     $db->query("SELECT kb_doc.ID, msdc_user.user, kb_doc.date, kb_doc.subject "
               ."FROM kb_doc LEFT JOIN kb_node_doc ON kb_doc.ID = kb_node_doc.docID "
               ."LEFT JOIN msdc_user on kb_doc.userID = msdc_user.ID "
               ."WHERE kb_node_doc.nodeID=$nodeID");

     if ($db->num_rows > 0) {
?> <br><br>
   <table align="center" cellspacing="0" cellpadding="1" width="500">
   <tr><th align="left" bgcolor="gold" colspan="3">Documents
<?
     }

     while($db->next_record()){

        // THIS would probably work better as a component..
        $kbView[$i+1] = $db->Record["ID"];

        if ($i % 2 == 1) { $c="#EEEEEE"; } else { $c="#CCCCCC"; }
?>
 <tr>
   <td bgcolor="<? print $c ?>" width="100"><? print  $db->Record["date"] ?>
   <td bgcolor="<? print $c ?>" width-"150"><? print  $db->Record["authorID"] ?>
   <td bgcolor="<? print $c ?>" width="250"><a href="viewdoc.php3?docID=<? print $db->Record["ID"] . '">' . $db->Record["subject"]; ?></a>
 </tr>
<?
     // still in that while loop ..
   }

  // session("kb_view_len")=i-1

  } // end if


page_close();
msdc_footer();

?>
</BODY>
</HTML>



