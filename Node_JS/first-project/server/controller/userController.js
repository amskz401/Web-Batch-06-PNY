const User = require("../model/User");
const validator = require("email-validator");

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
  let check_email = validator.validate(req.body.user_email);
  if (!check_email) {
    req.flash("error", "Invliad email");
    res.redirect("/login");
    return false;
  }
  User.findOne(req.body)
    .then((user) => {
      if (user) {
        req.session.regenerate(function (err) {
          req.session.user = user;
          req.session.save(function (err) {
            if (err) return next(err);
            res.redirect("/admin");
          });
        });
      } else {
        req.flash("error", "Username/Password not matched!");
        res.redirect("/login");
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

module.exports = { registerUser, userLogin };
