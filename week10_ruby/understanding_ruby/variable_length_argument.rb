#!/usr/bin/env ruby

def varargs(arg1, *rest)
	puts "Got #{arg1} and #{rest.join(', ')}"
end

varargs("one")
varargs("one", "two")
varargs("one", "two", "three")