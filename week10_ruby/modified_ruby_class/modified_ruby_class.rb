#!/usr/bin/env ruby

def draw_line
	count = (1..60)
	count.collect {
		|i| print "=" if i != count.last
			print "\n" unless i != count.last
	}
end

class Fixnum
	def double
		self * 2
	end

	def next
		self + 1
	end

	def prev
		self - 1
	end

	def skip
		self + 2
	end
end

class String
	def reverse_original
		result = ""
		i = self.length - 1
		while i >= 0 do
			result += self[i]
			i -= 1	
		end
		return self.replace(result)
	end
end

class Array
	def iterate!
		self.each_with_index do |n, i|
			# puts "value #{n}, index #{i}"
			self[i] = yield(n)
		end
	end

	def filter
		self.each do |n|
			if !yield(n)
				return [n]
			end 
		end
	end

	def filter!
		temp = []
		self.each do |n|
			if !yield(n)
				temp.push(n)
			end			
		end
		return self.replace(temp)
	end
end

class Hash
	def foreach
		for key, value in self
			yield(key, value)
		end
	end
end

puts "* Fixnum class"
puts "2.double: #{2.double}, 4.double: #{4.double}, 4.double.double: #{4.double.double}"
puts "2.next: #{2.next}, 5.next: #{5.next}, -1.next: #{-1.next}"
puts "2.prev: #{2.prev}, 5.prev: #{5.prev}, -1.prev: #{-1.prev}"
puts "2.skip: #{2.skip}, 5.skip: #{5.skip}, -1.skip: #{-1.skip}"

draw_line

puts "* String class"

x = "Dojo"
y = x
z = x
x.reverse_original
puts y, z, x

draw_line

puts "* Array class"
arr = [1, 2, 3]
arr.iterate! do |el|
	el * el
end
puts arr

arr1 = [1, 10, 25]
puts "arr1: #{arr1}"
filtered_arr1 = arr1.filter { |el| el < 15 }

puts "filtered array1: #{filtered_arr1}"
puts "original array1: #{arr1}"


arr2 = [1, 10, 25]
puts "arr2: #{arr2}"
filtered_arr2 =  arr2.filter! { |el| el < 15}
# puts "arr2: #{arr2}"
puts "filtered_array2: #{filtered_arr2}"
puts "original array2: #{arr2}"


draw_line

puts "* Hash class"

h = {:name => "Dojo", :zip_code => 94043}
h.foreach do |key, value|
	puts "#{key}, #{value}"
end
