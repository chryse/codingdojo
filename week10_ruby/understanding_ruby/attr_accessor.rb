#!/usr/bin/env ruby

=begin
	long comment
=end

class Ninja
	def initialize str
		@name = str
	end

	# this is getter
	def name
		return @name
	end

	# this is setter
	def name=(name)
		@name = name
	end
end

Trey = Ninja.new("Trey")
# puts Trey.name

puts Trey.name

Trey.name = "Brue Lee"
puts Trey.name

class Ninja1
	attr_accessor :name
	def initialize
		@name = "Trey"
	end
end

jun = Ninja1.new
puts jun.name
jun.name = "Jun"
puts jun.name