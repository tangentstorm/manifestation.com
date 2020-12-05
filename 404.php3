<? 
   include "../lib/station.inc"; 
// msdc search page
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"
  "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>
<title>manifest station: search</title>
<link rel="stylesheet" href="/station.css">
</head>
<body>

<? msdc_toolbar(""); ?>

<h1 align="center">404</h1>
<p align="center">Looks like whatever you were looking for ain't here.</p>

<form action="/search.php3">
<table class="msdcStuff" border="0" cellspacing="0" cellpadding="2" align="center" width="450">
<tr><th align="left" colspan="3">search</th></tr>
<tr><td>query:</td>
    <td><input type="text" name="q" size="40" value="<? print $q; ?>"></td>
    <td><input type="submit" value="submit"></td>
</tr>
</table>
</form>


<p>&nbsp;</p>

<? msdc_footer(); ?>

<body>
</html>