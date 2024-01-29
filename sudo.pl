#!/usr/bin/perl

$output = ` grep "sudo:session" /var/log/auth.log | grep opened`;
$count = $output =~ tr/\n//;
print ($count);


