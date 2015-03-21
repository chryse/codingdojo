# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the rake db:seed (or created alongside the db with db:setup).
#
# Examples:
#
#   cities = City.create([{ name: 'Chicago' }, { name: 'Copenhagen' }])
#   Mayor.create(name: 'Emanuel', city: cities.first)

User.create!(first_name: 				"Jun",
			 last_name: 				"Kim",
             email: 					"timeisonourside@gmail.com",
             password: 					"password",
             password_confirmation: 	"password",
             location: 					"sunnyvale",
             state: 					"CA")

10.times do |n|
	first_name  = Faker::Name.first_name
  	last_name = Faker::Name.last_name
  	email = "example-#{n+1}@example.com"
  	password = "password"
  	User.create!(first_name:  first_name,
  			   	last_name: 	last_name,
               	email: email,
               	password:              password,
               	password_confirmation: password,
				location: 				Faker::Address.city,
             	state: 					"CA")
end

# Following relationships
# users = User.all
# user  = users.first
# joining = users[2..50]
# followers = users[3..40]

# following.each do |followed|
# 	user.follow(followed)
# end

# followers.each do |follower|
# 	follower.follow(user)
# end