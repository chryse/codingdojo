#!/usr/bin/env ruby

monster1 = {:health => 500}
monster2 = {:health => 500}

for i in 1..5
	(1..40).collect { print "=" }

	puts "\nROUND #{i}:"
	mon1_attack = rand(1..100)
	mon2_attack = rand(1..100)
	monster1[:health] -= mon2_attack
	monster2[:health] -= mon1_attack
	puts "monster1 attacks monster2 with #{mon1_attack} damage"
	puts "monster2's health is now #{monster2[:health]}/500"
	puts "monster2 attacks monster1 with #{mon2_attack} damage"
	puts "monster1's health is now #{monster1[:health]}/500"

	if i == 5
		(1..40).collect { print "*" }
		puts ""
		puts "monster1 wins the game" if monster1[:health] > monster2[:health]
		puts "monster2 wins the game" unless monster1[:health] > monster2[:health]
		puts "draw" if monster1[:health] == monster2[:health]
		
	end

end