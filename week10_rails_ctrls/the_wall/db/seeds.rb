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
             admin: 					true)

99.times do |n|
  first_name  = Faker::Name.first_name
  last_name = Faker::Name.last_name
  email = "example-#{n+1}@example.com"
  password = "password"
  User.create!(first_name:  first_name,
  			   last_name: 	last_name,
               email: email,
               password:              password,
               password_confirmation: password)
end

users = User.order(:created_at).take(10)
50.times do
	content = Faker::Lorem.sentence(5)
	users.each do |user|
		user.posts.create!(content: content)
	end
end

# Following relationships
users = User.all
user  = users.first
following = users[2..50]
followers = users[3..40]

following.each do |followed|
	user.follow(followed)
end

followers.each do |follower|
	follower.follow(user)
end