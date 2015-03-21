# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the rake db:seed (or created alongside the db with db:setup).
#
# Examples:
#
#   cities = City.create([{ name: 'Chicago' }, { name: 'Copenhagen' }])
#   Mayor.create(name: 'Emanuel', city: cities.first)

User.create!(name: 				"Jun",
             alias:           "Jun in",
             email: 					"timeisonourside@gmail.com",
             password: 					"password",
             password_confirmation: 	"password")

5.times do |n|
    name  = Faker::Name.name
  	alias1 = Faker::Name.name
  	email = "example-#{n+1}@example.com"
  	password = "password"
  	User.create!(name:  name,
  			   	     alias: 	alias1,
               	email: email,
               	password:              password,
               	password_confirmation: password)
end


users = User.order(:created_at).take(10)
5.times do
  content = Faker::Lorem.sentence(5)
  users.each do |user|
    user.posts.create!(content: content)
  end
end