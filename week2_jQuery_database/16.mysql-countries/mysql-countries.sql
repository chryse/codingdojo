use world;

-- 1.What query would you run  to get all the countries that speak Slovene.
-- Your query should return the name of the country, language, and language percentage.
-- You query should arrange the result by language percentage in descending order
select countries.name, languages.language, languages.percentage from countries
join languages on countries.id = languages.country_id
where languages.language = "Slovene"
order by languages.percentage desc;

-- 2.What query would you run to display the total number of cities for each country.
-- Your query should return the name of the country and the total number of cities.
-- You query should arrange the result by number of cities in descending order
select count(cities.id), countries.name
from cities
join countries on cities.country_id = countries.id
group by countries.id
order by count(cities.id) desc;

-- 3.What query would you run to get all the cities in mexico with a population of greater
-- than 500,000. Your query should arrange the result by population in descending order.
select cities.name, cities.population
from cities
join countries on cities.country_id = countries.id
where countries.name = "Mexico" and cities.population > 500000
order by cities.population desc;

-- 4.What query would you run to get all language in each country with a percentage greater than
-- 89%. Your query  should arrange the result by percentage in descending order.
select languages.language, countries.name, languages.percentage
from languages
join countries on languages.country_id = countries.id
where languages.percentage > 89.0
order by languages.percentage desc;

-- 5.What query would you run to get all the countries with Surface Area below 501 and
-- Population greater than 100,000
select name, surface_area
from countries
where surface_area < 501 and population > 100000;

-- 6.What query would you run to get countries with only Consititutional Monarchy with 
-- a capital greater than 200 and a life expectancy greater than 75 years.
select name, government_form, capital
from countries
where government_form like "Constitutional Monarchy"
and capital > 200
and life_expectancy > 75;

-- 7.What query would you run to get all the cities of Argentina inside the Buenos Aires district
-- and have population greater than 500,000. The query should return the Country Name, City Name,
-- District and Population
select countries.name, cities.name, cities.district, cities.population
from cities
join countries on cities.country_id = countries.id
where countries.name = "Argentina"
and cities.district = "Buenos Aires"
and cities.population > 500000;


-- 8.What query would you run to summerize the number of countries in each region. The query
-- should display the name of the region and the number of countries. Also, the query should
-- arrange the result by number of countries in descending order.
select region, count(id) as "number of countries"
from countries
group by region
order by count(id) desc;
