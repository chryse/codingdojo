#!/usr/bin/env ruby

class Mdas

	attr_accessor :first_number, :second_number, :operator

	def initialize(first_number, second_number, operator)
		@first_number = first_number.to_f
		@second_number = second_number.to_f
		@operator = operator.to_i
	end

	def add
		return (@first_number + @second_number)
	end

	def subs
		return (@first_number - @second_number)
	end

	def multi
		return (@first_number * @second_number)
	end

	def div
		return (@first_number / @second_number)
	end

	def result
		case @operator
		when 1
			# puts "plus"
			answer = add
			operator = "Addition"
		when 2
			# puts "minus"
			answer = subs
			operator = "Substraction"
		when 3
			# puts "multiply"
			answer = multi
			operator = "Multiplication"
		when 4
			# puts "divide"
			answer = div
			operator = "Division"
		end

		puts "The answer is #{answer}"
		puts "Operator user is #{operator}"
	end
end

# a = Mdas.new(1, 2, 4)
# a.result

puts "Enter the first number"
first_number = gets.chomp
puts "Enter the seconde number"
second_number = gets.chomp
puts "Enter an operator 1 is Addition, 2 is Substraction, 3 is Multiplication, and 4 is Division"
operator = gets.chomp
operator = operator.to_i

if (1..4).member?(operator) 
	input = Mdas.new(first_number, second_number, operator)
	input.result
else
	puts "Please enter the correct number" 
end

