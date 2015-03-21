#!/usr/bin/env ruby

=begin
Create an array with the following values: 
3,5,1,2,7,9,8,13,25,32. Print the sum of all numbers in the array. 
Also have the function return an array that only include numbers that are greater than 10 
(E.g. when you pass the array above, 
it should return an array with the values of 13,25,32 - hint: use reject or find_all method)
=end

arr = [3, 5, 1, 2, 7, 9, 8, 13, 25, 32]
sum = 0
for i in arr
	sum += i
end
puts sum

def func1 arr
	a = arr.find_all {|i| i > 10}
	return a
end
puts func1 arr


=begin 
Create an array with the following values: 
John, KB, Oliver, Cory, Matthew, Christopher. 
Shuffle the array and print the name of each person. 
Have the program also return an array with names that are longer than 5 characters.
=end

puts "\n====================================="
names = ["John", "KB", "Oliver", "Cory", "Matthew", "Christopher"]
def shuffle_name arr
	tmp = arr.shuffle
	tmp.each {|name| print "#{name} "}
end

shuffle_name names

puts "\n====================================="
def long_name arr 
	result = arr.find_all {|name| name.length > 5}
	return result
end

puts long_name names


puts "\n====================================="

=begin 
Create an array that contains all 26 letters in the alphabet 
(this array must have 26 values). Shuffle the array and display the last letter of the array. 
Have it also display the first letter of the array. 
If the first letter in the array is a vowel, have it display a message
=end
alphabets = ("a".."z")

shuffled_alphabets = alphabets.to_a.shuffle
print shuffled_alphabets
puts ""
puts shuffled_alphabets.last
first = shuffled_alphabets.first
puts "first letter is vowel" if "aeiou".include?(first)


# Generate an array with 10 random numbers between 55-100.
puts "random number is #{rand(55..100)}"

=begin
Generate an array with 10 random numbers between 55-100 
and have it be sorted (showing the smallest number in the beginning). 
Display all the numbers in the arrays. 
Next, display the minimum value in the array as well as the maximum value.	
=end
rand_nums = (1..10).collect {rand(55..100)}
puts "sorted num array is #{rand_nums.sort}"
puts "min number is #{rand_nums.min}"
puts "max number is #{rand_nums.max}"


# Create a random string that is 5 characters long (hint: (65+rand(26)).chr returns a random character
rand_chars =  (0..4).collect {|i| ("a".."z").to_a.shuffle[i].to_s}
puts "random characters are #{rand_chars}"
# puts "#{65+rand(26).chr}"
# puts ("a".."z").collect { |char| char }
puts "random characters are #{(1..5).collect {(65+rand(26)).chr }}"
puts 97.chr # a
puts 122.chr # z

# Generate an array with 10 random strings that are each 5 characters long
words = []
puts "10 random strings with 5 characters : #{(1..10).collect {(1..5).collect {(65+rand(26)).chr }}}"
