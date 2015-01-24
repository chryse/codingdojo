use lead_gen_business;
select * from clients;

-- 1. find all the clients
select * from clients;

-- 2. find the names of all the clients
select first_name, last_name from clients;

-- 3. find all the emails for the clients that joined in 2011
select email, joined_datetime from clients
where joined_datetime >= "2011-01-01" and joined_datetime <= "2011-12-31";

-- 4. find the first name of the client that joined between April of 2011 and June of 2011
select first_name from clients
where joined_datetime between "2011-04-01" and "2011-06-31";

-- 5. find all the bulling amounts that have an amout greater than  1000 and have been charge in 2012
select amount from billing
where amount > 1000 and charged_datetime between "2012-01-01" and "2012-12-31";


-- 6. find all the leads with last names Jones, Smith, Follosco and Supsupin
select * from leads
where last_name in("Jones", "Smith", "Follosco", "Supsupin");

-- 7. find all the leads that have a yahoo account
select * from leads
where email like "%yahoo.com";

-- 8. find all the billing amounts and sort them from heighest to lowest
select amount from billing
order by amount desc;

-- 9. find the 10 most recent leads to sign up
select * from leads
order by registered_datetime desc
limit 10;

