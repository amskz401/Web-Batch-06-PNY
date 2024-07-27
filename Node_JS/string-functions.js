let str = "Some test string for manipulation";
let str2 = "other string";

// to get each character of string
for(index of str){
	console.log(index);
}

// return length of a given string
console.log('characters count: ' + str.length);

// get 2nd last character
console.log(str.charAt(str.length - 2));

// combine two or more string
console.log(str.concat(str2));

// get index position of given string
console.log(str.indexOf('for'));

// repeat the whole string
console.log(str.repeat(5));

// 
console.log(str.replace('test', 'TEST'));

// return string from start index to given index
console.log(str.slice(5, 10));

// convert string to array
console.log(str.split(''));

// convert to lower 
console.log(str.toLowerCase());

// convert to upper
console.log(str.toUpperCase());

// remove spaces from start and end
console.log(str.trim());

// remove spaces from left/start
console.log(str.trimLeft());
console.log(str.trimStart());

// remove spaces from end/right
console.log(str.trimEnd());
console.log(str.trimRight());