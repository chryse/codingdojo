#!/usr/bin/env ruby

a = ["Matz", "Guido", "Dojo", "Choi", "John"]
b = [5, 6, 7, 1, 3, 9, 10, 8]
c = ["Dojo", 9]

puts a[2]

puts a + b

x = a + b
puts x.to_s

y = (a + b) - c
puts y.to_s

puts x.to_s.class

puts b.shuffle
puts b.shuffle.join(", ")

puts a.at(0)
puts a.fetch(3)

puts a.delete("John")
puts "====after deletion===="
puts a

puts "length of array a, #{a.length}"

puts "new array======="
new_array = %w{Matz Guido Dojo Choi John}
puts new_array