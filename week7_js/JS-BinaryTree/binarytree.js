function binarySearchTreeConstructor() {
	var tree = {};
	tree.root = null;
 	return tree;
}

function treeConstructor(val) {
	var current = {};
	current.value = val;
	current.left = null;
	current.right = null;
	current.add = function(addValue) {
		if(addValue < current.value) {
			if(current.left) {
				current.left.add(addValue);
			} else {
				current.left = treeConstructor(addValue);
				return true;
			}
		}
		if(addValue > current.value) {
			if(current.right) {
				current.right.add(addValue);
			} else {
				current.right = treeConstructor(addValue);
				return true;
			}
		}
		return false;
	}
	current.print = function() {
		if(current.left) {
			current.left.print();
		}
		console.log(current.value);
		if(current.right) {
			current.right.print();
		}
	}
	current.contains = function(findValue) {
		if(current.value == findValue) {
			return true
		}
		if(findValue < current.value && current.left) {
			return current.left.contains(findValue);

		if(findValue > current.value && current.right) {
			return current.right.contains(findValue);
		}
		return false;
	}
	return current;
}
var node1 = treeConstructor(10);
node1.add(7);
node1.add(12);
node1.add(9);
node1.add(1);
node1.print();
console.log(node1.contains(8));
