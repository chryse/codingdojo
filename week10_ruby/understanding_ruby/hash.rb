#!/usr/bin/env ruby

x = {"first_name" => "Jun", "last_name" => "Kim"}

puts x["first_name"], x["last_name"]
puts "Your last name is Kim" if x["last_name"].eql? "Kim"


y = {:first_name => "Jun", :last_name => "Kim"}

puts y[:first_name], y[:last_name]
puts "Your last name is Kim" if y[:last_name].eql? "Kim"

puts "DELETING :fisrt_name"
y.delete(:first_name)
puts "Y is now", y

if y.has_key?(:first_name)
	puts "Y has a key called :first_name"
else
	puts "Y does not have a key called :first_name"
end

if y.has_value?("Kim")
	puts "Y has value called Kim"
else
	puts "Y doet not have a value called Kim"
end