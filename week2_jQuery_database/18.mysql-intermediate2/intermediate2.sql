use relationship;

insert into users(first_name, last_name) value("Chris", "Baker");
insert into users(first_name, last_name) value("Diana", "Smith");
insert into users(first_name, last_name) value("James", "Johnson");
insert into users(first_name, last_name) value("Jessica", "Davidson");
insert into relationships(follower_id, followed_id) value(1, 4);
insert into relationships(follower_id, followed_id) value(1, 2);
insert into relationships(follower_id, followed_id) value(1, 3);
insert into relationships(follower_id, followed_id) value(2, 1);
insert into relationships(follower_id, followed_id) value(3, 1);
insert into relationships(follower_id, followed_id) value(4, 1);

select users.first_name, users.last_name, friends.first_name, friends.last_name
from users
join relationships on relationships.follower_id = users.id
join users as friends on friends.id = relationships.followed_id
order by friends.last_name;