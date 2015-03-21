#!/usr/bin/env ruby

x = "CodingDojo"

puts x.length

puts x.class

puts x.capitalize

puts x.upcase

puts x.downcase

puts x[2]

puts x.empty?

puts x.include?("dojo")

puts x.include?("Dojo")

y = "CodingDojo"

puts "This word has  the word 'Dojo'" if y.include? "Dojo"

z = "john, charles, matt, joe"

puts z.split(", ")

y = ""

puts "Y is empty" if y.empty?