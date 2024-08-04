const User = require("../model/User");

const registerUser = (req, res) => {
  const newUser = new User(req.body);
  newUser
    .save()
    .then((user) => {
      console.log(user);
      res.redirect("/login");
    })
    .catch((error) => {
      console.log(error);
    });
};

const userLogin = (req, res) => {
  User.findOne(req.body)
    .then((user) => {
      console.log(user);

      if (user) {
        res.redirect("/");
      } else {
        res.redirect("/login");
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

module.exports = { registerUser, userLogin };
