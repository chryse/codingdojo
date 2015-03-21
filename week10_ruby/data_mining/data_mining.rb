#!/usr/bin/env ruby

require "open-uri"
require "nokogiri"

# puts "Enter a site"

# url = gets.chomp
urls = []
(0..60).each do |i|
	urls.push("http://yukimall.com/front/php/product.php?product_no=2848&main_cate_no=#{i}&display_group=1")
end

# url = "http://yukimall.com/front/php/product.php?product_no=2848&main_cate_no=47&display_group=1"

file = open("yukimall.html", "w")

for url in urls
	page = Nokogiri::HTML(open(url))
	page.css("img").collect do |node|
		file.write(node)
		file.write("\n")
	end
end

file.write("finish crawling")
file.close
# page = Nokogiri::HTML(open(url))
# content = page.css("img").collect do |node|
# 	# node
# 	puts node
# end
# .join(" ")