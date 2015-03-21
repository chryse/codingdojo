#!/usr/bin/env ruby

x = 1

if x > 2
	puts "x is greater than 2"
elsif x < 2 and x > 0
	puts "x is 1"
else
	puts "I can't guess the number"
end

x = 5
puts "x is not 2" if x != 2
puts "x is greater than 2" if x > 2

puts "x is not 2" unless x==2

age = 19
case age
when 0..2
	puts "baby"
when 3..6
	puts "little child"
when 7..12
	puts "child"
when 13..18
	puts "youth"
else
	puts "adult"
end

