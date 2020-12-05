<?
//
// home page for manifestation.com
//

    include "../lib/station.inc";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"
  "http://www.w3.org/TR/REC-html40/loose.dtd">
<html> 
<head>
<title>manifest station: change your mind</title>
<META name="Description" content="Self-improvement news, articles,
books, and software.">
<META name="Keywords" content="nlp, NLP, success, persuasion, psychology,
neuro linguistic programming, training, health, money, energy, ecology,
power, sales, self help, self improvement, empowerment, creativity,
manifestation">
<link rel="stylesheet" href="station.css">
</head>
<body bgcolor="#ffffff" text="#000000">


<!-- about this site  -->
<table cellspacing="0" cellpadding="2" border="0" width="390" style="float:left">
<tr><th align="left" class="msdcstuff">about this site</td></tr>
<tr><td align="left" class="msdcStuff">
I believe people can change in an instant. That doesn't mean we'll
lose fifty pounds overnight, or suddenly find members of the opposite
sex throwing themselves at our feet. But we can make decisions that
move our lives in a new direction. The instant we make those decisions
is the instant we change our lives.
<p>
I hope this site helps you find what you're looking for. From the weblog
above, a constant source of useful and inspiring articles, to the growing
list of <a href="/resources/">articles and interactive neurotoys</a> to our
<a href="/buddha/">e-mail newsletter</a>, each area of this site can help
you on your journey.
<p>
Like everything else, manifestation.com is constantly evolving. In the
coming weeks and months, I'll be adding more software, more articles,
a discussion forum, and a huge directory of links to other sites. 
In the meantime, feel free to look around, submit articles, and send
feedback on anything you think could be improved.
<p>
Happy exploring!
<p align="right">-Michal Wallace (<a href="mailto:sabren@manifestation.com">sabren@manifestation.com</a>)
</td></tr>
</table>

</td>

<td width="10" rowspan="2">&nbsp;</td>

<td valign="top" width="200">

<!-- guru -->
<img src="images/art/guru_3d.jpg" height="150" width="150" align="left"
     alt="">
<br clear="all">


<!-- search subtable -->
<table cellspacing="0" cellpadding="2" width="200" border="0" class="msdcTool">
<tr><th class="msdcTool" align="left">
    search:</th></tr>
<tr><td class="msdcTool">
  &nbsp;&nbsp;<font size="2"><input type="text" name="q" style="font-family: courier new, courier; font-size : 12px;" size="20"></font>
</td></tr>
</table>

<br>

<table width="200" border="0" cellpadding="2" cellspacing="0" class="msdcTool">
<tr><th align="left" class="msdcTool">interact</th></tr>

    <tr><td>&nbsp;&nbsp;<a href="/hive/submit.php3">submit a story</a></td></tr>
    <tr><td>&nbsp;&nbsp;<a href="http://www.egroups.com/list/mindlist/">mindlist</a></td></tr>
    <tr><td>&nbsp;&nbsp;<a href="http://x5.dejanews.com/dnquery.xp?query=%7eg%20(alt.psychology.nlp)">a.p.nlp</a></td></tr>

</table>

<br>

<!-- neurotoys -->
<table width="200" class="msdcTool" cellspacing="0" border="0" cellpadding="2">
<tr><th align="left" class="msdcTool">neurotoys</th></tr>

<tr><td>&nbsp;&nbsp;<a href="/neurotoys/learnfast/">superlearning applet</a></td></tr>
<tr><td>&nbsp;&nbsp;<a href="/neurotoys/calibrate.php3">calibration applet</a></td></tr>
<tr><td>&nbsp;&nbsp;<a href="/neurotoys/eprime.pl">e-Prime checker</a></td></tr>
<tr><td>&nbsp;&nbsp;<a href="/neurotoys/eliza.php3">eliza</a></td></tr>
</table>

<br>

</td></tr>
<tr><td valign="bottom">

<!-- finally, the quote -->

<table width="200" cellspacing="0" cellpadding="2" border="0">
<?
   // get a random record from the quotes table..
$db = new msdc_DB();
   $db->query("select count(ID) as count from msdc_quote");
   $db->next_record();
   $count = $db->Record["count"]; 

   srand((double)microtime()*1000000);
   $index = rand() % $count;

   $db->query("select quote, author from msdc_quote limit $index, 1");
   $db->next_record();
?>
<tr><td align="right" ><i>
      <? print $db->Record["quote"]; ?>
    </i></td></tr>
<tr><td align="right" style="font-size:smaller;">
      -- <? print $db->Record["author"]; ?>
    </td></tr>
</table>

</td>

</tr></table>
</form>

<!-- END CONTENT -->

<? msdc_footer(); ?>

</body>
</html>
