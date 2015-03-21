#!/usr/bin/env ruby
class Student
	attr_accessor :name, :dojo_location, :belt_level

	def initialize(name, dojo_location, belt_level)
		@name = name
		@dojo_location = dojo_location
		@belt_level = belt_level
	end

end

jun = Student.new("Jun", "San Jose", "Black")
puts jun.name
puts jun.dojo_location
puts jun.belt_level

jun.belt_level = "Double Black"
puts jun.belt_level