use lead_gen_business;

-- Text
-- CONCAT()
select concat("Mr. ", first_name, " ", last_name) as "full name" from clients;
-- LENGTH()
-- LOWER()


-- Date
-- HOUR()
select hour(joined_datetime) as date_hour, joined_datetime from clients;
-- DAYNAME()
select dayname(joined_datetime) as day_name, joined_datetime from clients;
-- MONTH()
select month(joined_datetime) as month_number, joined_datetime from clients;
-- NOW()
select now() as right_now;
-- DATE_FORMAT()
select date_format(joined_datetime, "%W %M %e, %Y") from clients;