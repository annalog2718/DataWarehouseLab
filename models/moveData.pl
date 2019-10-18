use strict;
use warnings;

my $file = 'Runescape_Market_Data.txt';
open (my $fin, '<', $file);

while(my $line = <$fin>)

