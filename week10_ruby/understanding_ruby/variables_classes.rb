#!/usr/bin/env ruby

class CodingDojo
	@@no_of_branches = 0

	def initialize(id, name, address)
		@branch_id = id
		@branch_name = name
		@branch_address = address
		@@no_of_branches += 1
		puts "\nCreated branch #{@@no_of_branches}"
	end

	def hello
		puts "Hello CodingDojo!"
	end

	def displayAll
		puts "Branch ID: %d" % @branch_id
		puts "Branch Name: %s" % @branch_name
		puts "Branch Address: %s" % @branch_address
	end

	protected
	def protected_method
		puts "This is a protected method"
	end

	private
	def private_method
		puts "This is a private method"
	end

	# Class method
	def self.self_method
		puts "This is a class method"
	end
end

CodingDojo.self_method
branch = CodingDojo.new(254, "SF CodingDojo", "Sunnyvale CA")
branch.displayAll

branch2 = CodingDojo.new(155, "Boston CodingDojo", "Boston CA")
branch2.displayAll


# Inheritance

class ParentClass
	def a_method
		puts "a"
	end
end

class ChildClass < ParentClass
	def b_method
		puts "b"
	end
end

instance = ChildClass.new
instance.a_method
instance.b_method