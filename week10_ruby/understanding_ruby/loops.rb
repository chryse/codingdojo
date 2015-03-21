#!/usr/bin/env ruby

$i = 0
$num = 5
begin
	puts "Inside the loop i = #{$i}"

	puts "$i is now 3" if $i == 3
	puts "$i is not 3" unless $i == 3
	$i += 1
end while $i < $num


for i in 0..5
	puts "Value of local variable i is #{i}"

	puts "i is now 3" if i == 3
end