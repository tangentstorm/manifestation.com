#!/usr/local/bin/perl5 -w
require 5;
use DB_File;
use Fcntl;

tie(%index,DB_File, '/usr/www/users/sabren/idx/msdc.idx',
    O_RDONLY, 0, $DB_BTREE);

# Look up each word (~0.01 sec)
foreach $word (@ARGV) {
    $keys = $index{lc $word};
    foreach $key (unpack("n*",$keys))
       { $matches{$key}++; }
}

# Rank by total matches (~0.04 sec)
@matches = sort 
   { $matches{$b} <=> $matches{$a} 
     || $a <=> $b }
   (keys %matches);

# Look up keys and print files (~0.04 sec)

if (! @matches) {
    print "<p><i>no matches found</i></p>\n";
}

foreach $key (@matches) {
  $name = $index{pack("xn",$key)};

  ($relpath, $title) = split '\|', $name;

  $relpath =~ s|^manifestation/||;
  print "<p>&nbsp;&nbsp;<a href=\"/$relpath\">$title</a></p>\n";
}
untie(%index);
