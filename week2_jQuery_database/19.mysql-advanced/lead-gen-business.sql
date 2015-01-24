use lead_gen_business;

-- 1. What query would you run to get the total revenue for March of 2012
select concat("$",format(sum(amount),0))
from billing
where charged_datetime >= "2012-03-01"
and charged_datetime <= "2012-03-31";

-- 2. What query would you run to get total revenue collected from clinet=2?
select concat("$", format(sum(billing.amount), 0))
from billing
join clients on clients.client_id = billing.client_id
where clients.client_id = 2;

-- 3. What query would you run to get all the sites that client = 10 owns?
select sites.domain_name
from sites
join clients on clients.client_id = sites.client_id
where clients.client_id = 10;

-- 4.What query would you run to get total # of sites created each month for client =1 ?
-- What about for client == 20?
select count(sites.domain_name) as "# of websites", clients.client_id, 
year(sites.created_datetime) as "year_created", monthname(sites.created_datetime) as "month_created"
from sites
join clients on clients.client_id = sites.client_id
where clients.client_id = 1
or clients.client_id = 20
group by sites.site_id
order by clients.client_id;

-- 5.what query would you run to get the total # of leads we've generated for each of our sites
-- between January 1st 2011 to February 15th 2011?
select concat(sites.domain_name, ": ", count(sites.site_id))
from leads
join sites on sites.site_id = leads.site_id
where leads.registered_datetime between "2011-01-01" and "2011-02-15"
group by sites.domain_name;

-- 6.What query would you run to get a list of client name and the total # of leads 
-- we've generated for each of our clients between January 1st 2011 to December 31st 2011?
select concat(clients.first_name, " ", clients.last_name) as "full name",
count(leads.leads_id) as "total # of leads"
from clients
join sites on sites.client_id = clients.client_id
join leads on leads.site_id = sites.site_id
where registered_datetime between "2011-01-01" and "2011-12-31"
group by clients.client_id;


-- 7. What query would you run to get a list of client name and the total # of leads we've
-- generated for each client each month between month 1 - 6 of year 2011?
select concat(clients.first_name, " ", clients.last_name) as "full name",
count(leads.leads_id) as "total # of leads", monthname(leads.registered_datetime)
from clients
join sites on sites.client_id = clients.client_id
join leads on leads.site_id = sites.site_id
where leads.registered_datetime between "2011-01-01" and "2011-06-31"
group by clients.client_id, registered_datetime;
-- ;


-- 8. What query would you run to get a list of client name and the total # of leads we've
-- generated for each of our client's sites between January 1st 2011 to December 31st 2011?
select concat(clients.first_name, " ", clients.last_name) as "full name",
sites.domain_name, count(leads.leads_id) as "total # of leads"
from clients
join sites on sites.client_id = clients.client_id
join leads on leads.site_id = sites.site_id
where leads.registered_datetime between "2011-01-01" and "2011-12-31"
group by sites.site_id;

-- Come up with a second query that shows all the clients, the site name(s), and the total
-- number of leads generated from each site for all time.
select concat(clients.first_name, " ", clients.last_name) as "full name",
sites.domain_name, count(leads.leads_id) as "total # of leads"
from clients
join sites on sites.client_id = clients.client_id
join leads on leads.site_id = sites.site_id
group by sites.site_id;


-- 9. Wriete a single query that retrieves total revenue 
-- collected from each client each month of the year
select clients.first_name, sum(billing.amount),
monthname(billing.charged_datetime), year(billing.charged_datetime)
from billing
join clients on clients.client_id = billing.client_id
group by clients.client_id, month(billing.charged_datetime);


-- 10. Write a single query that retrieves all the sites that each client owns.
-- Group the results so that each row shows a new client and have a new field called
-- sites" that has all the sites that the client owns.(Hint: use GROUP_CONCAT)
select concat(clients.first_name, " ", clients.last_name) as "full_name",
group_concat(sites.domain_name) as "clients own sites."
from clients
left join sites on sites.client_id = clients.client_id
group by clients.client_id;