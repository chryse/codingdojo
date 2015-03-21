#!/usr/bin/env ruby
class MathDojo

	attr_accessor :result

	def initialize
		@result = 0
	end

	def add(arg, *args)
		@result += arg
		args.each {|i| @result += i }
		return self
	end

	def subtract(arg, *args)
		@result -= arg
		args.each {|i| @result -= i }
		return self
	end
end

num = MathDojo.new
puts num.add(2).add(2, 5).subtract(3, 2).result		# result 4


class MathDojo1

	attr_accessor :result

	def initialize
		@result = 0.0
	end

	def add(arg, *args)
		
		if arg.class == Fixnum
			@result += arg
			# puts "current: #{@result}"
		else
			arg.each { |i| @result += i }
			# puts "current: #{@result}"
		end
		
		if args.length != 0
			args[0].each { |j| @result += j }
			# puts "current: #{@result}"
		end

		return self
	end

	def subtract(arg, *args)

		if arg.class == Fixnum
			@result -= arg
			# puts "current: #{@result}"
		else 
			arg.each { |i| @result -= i }
			# puts "current: #{@result}"
		end
		
		if args.length != 0
			args[0].each { |j| @result -= j }
			# puts "current: #{@result}"
		end
		return self
	end
end

num1 = MathDojo1.new
puts num1.add(1).add([3, 5, 7, 8], [2, 4.3, 1.25]).subtract([2,3], [1.1, 2.3]).result	# result: 23.15