var jay = "Instructor";
console.log(jay);
function changeJay() {
	console.log(jay);
	var jay = "Good Instructor";
	var michael = "Sensei";
	console.log(michael);
}
changeJay();
// Instructor, undefined, Sensei
console.log(jay, michael); // error
