let student_id = [10, 11, 12, 13, 14];
let student_name = ["Farhan", "Ahmad", "ali"];

// console.log(student_id.length);
// for (let i = 0; i < student_id.length; i++) {
//   if (student_id[i] == 12) {
//     console.log(student_id[i] + " find at index: " + i);
//   }
// }

// student_id.forEach(function (id) {
//   console.log(id);
// });

let students = [
  {
    id: 1,
    name: "Farhan",
    phone: "224324343",
    email: "farhan@m.com",
  },
  {
    id: 2,
    name: "Farhan",
    phone: "224324343",
    email: "farhan@m.com",
  },
  {
    id: 3,
    name: "Farhan",
    phone: "224324343",
    email: "farhan@m.com",
  },
];

students.forEach(function (student) {
  console.log(student.id);
});
