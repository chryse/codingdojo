// we want to create an object constructor (something that constructs objects) that creates objects which are nodes.


// HOW TO DO RECURSION READ THIS FIRST:
// every recursive function needs 2 things: the base case and the recursive call
// the base case handles the case that stops the recursive call (stops an infinite loop)
// try to identify the base case and the recursive call(s) in each of the functions (add, print, find)

// this function is an object constructor that returns our node object
function nodeConstructor(v) {
	var current = {}; // declare the object that we are constructing
	current.value = v; // setting the value attribute of that object to be v
	current.left = null;
	current.right = null;
	current.add = function(addValue) {
		// do something to add a new node to either the left or right (or left or right subtrees)
		if(addValue < current.value) {
			if(current.left) {
				// do something where we run add on node.left
				// hint: recursive
				return current.left.add(addValue)
			}
			else {
				// set node.left to be a new node with value addValue
				current.left = nodeConstructor(addValue);
				return true;
			}
		}
		if(addValue > current.value) {
			if(current.right) {
				// do something where we run add on node.right
				// hint: recursive
				return current.right.add(addValue)
			}
			else {
				// set node.right to be a new node with value addValue
				current.right = nodeConstructor(addValue);
				return true;
			}
		}
		return false // we didn't add anything so return false (if its not greater or less than then it must be equal to. NO DUPLICATES!!!)

		// think about every case we need to handle first (adding greater than, less than, and equal to.)
	}
	// traverse the tree and print left to right
	current.print = function() {
		// print everything to the left
		if(current.left) {
			// print left
			// hint: recursive
			current.left.print();
		}
		// print current
		console.log(current.value)
		// print everything to the right
		if(current.right) {
			// print right
			// hint: recursive
			current.right.print();
		}
	}
	current.find = function(findValue) {
		// check if a given value exists
		// check if the current's value equals the value you're looking for and return true if it is
		if(current.value == findValue) {
			return true
		}
		// if the value is less than the current value and there is a left node then the value we are trying to find has to be to the left (if it even exists)
		if(findValue < current.value && current.left) {
			// go left and run the function on the left node recursively
			return current.left.contains(findValue);
		}
		// if the value is greater than the current value and there is a right node then the value we are trying to find has to be to the right (if it even exists)
		if(findValue > current.value && current.right) {
			// go right and run the function on the right node recursively
			return current.right.contains(findValue);
		}
		// if we havn't returned to this point then we havn't found the node so return false
		return false;
	}
	return current; // returning the newly created object
}
var tree = nodeConstructor(10);
tree.add(9);
tree.add(8);
tree.print();
