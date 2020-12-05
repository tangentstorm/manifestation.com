<?
include "lib/station.inc";
include "lib/view.inc";

$v = new View(

   "select mas_content.ID, DATE_FORMAT(creationdate, '%c/%e') as date, "
  ."  mas_content.subject, content, msdc_user.user, "
   ."  count(hive_response.ID) as responses "
   ."from hive_content, msdc_user, mas_content  "
   ."  left join hive_response on mas_content.ID = hive_response.contentID "
   ."where (hive_content.contentID = mas_content.ID) "
   ."  and (mas_content.userID = msdc_user.ID) "
   ."  and (forStation) and (isactive) "
   ."group by mas_content.ID "
   ."order by creationdate desc");

$v->pagesize=1000;
$v->show();

?>






