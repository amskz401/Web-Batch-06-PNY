let num = 12;
let num2 = 12;


// Arithmetic Operators (/, *, -, +, %)
// alert(num + num2);

// Assigment Operators (/, *, -, +, %)
let sum = 0;
sum = num + num2;

// Comparison Operators (false, true)
console.log(num == num2);
console.log(num === num2);

// not equal
console.log(num != num2);
console.log(num !== num2);

// greater than / greater than equal
console.log(num > num2);
console.log(num >= num2);

// less than / less than equal
console.log(num < num2);
console.log(num <= num2);

// ternary operator (condition) ? "true" : "false";
let comp = (num < num2) ? "ok" : "not ok";
console.log(comp);

// logical operators (&&, ||, !)
console.log(num <= num2 && num > 13);
console.log(num <= num2 || num > 13);
console.log( num <= num2);
console.log( !(num <= num2 && num > 13) );

// conditional statements (if else, if elseif elseif elseif else);
// if(num < num2) {
// 	alert("OK");
// } else {
// 	alert("not ok");
// }

// let grades = 70;

// if( grades >= 70 && grades < 80) {
// 	alert("B");
// }
// else if(grades >= 80 && grades < 90) {
// 	alert("B+");
// }
// else if(grades >= 90 && grades < 95) {
// 	alert("A")
// }
// else if(grades >= 95) {
// 	alert("A+")
// }
// else {
// 	alert("C");
// }


// Switch Statement 

switch(grades){
case 70:
	alert("B");
	break;
case 80:
	alert("B+");
	break;
case 90:
	alert("A");
	break;
case 95:
	alert("A+");
	break;
default:
	alert("C");
	break;
}