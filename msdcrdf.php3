<?php

   include "lib/station.inc";
   include "lib/view.inc";

   $v = new View ("select mas_content.ID, mas_content.subject "
                 ."from hive_content, mas_content "
                 ."where hive_content.contentID = mas_content.ID "
                 ."  and (forStation) and (isactive) "
                 ."order by creationdate desc");

   $v->head="";
   $v->foot="";

   $v->body="<item>\n"
           ."   <title>\$subject</title>\n"
           ."   <link>http://www.manifestation.com/hive/talkback.php3?"
           .         "contentID=\$ID</link>\n"
           ."</item>\n\n";

   print "<?xml version=\"1.0\"?>\n";
?>
<rdf:RDF 
xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
xmlns="http://my.netscape.com/rdf/simple/0.9/">

<channel>
  <title>manifest station</title>
  <link>http://www.manifestation.com/</link>
  <description>
      Self-improvement news, links, and articles with
      a focus on NLP.
  </description>
</channel>

<?

   $v->show();

?>

</rdf:RDF>
