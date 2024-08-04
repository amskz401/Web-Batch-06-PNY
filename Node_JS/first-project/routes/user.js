const express = require("express");
const {
  registerUser,
  userLogin,
} = require("../server/controller/userController");

const router = express.Router();

router.get("/login", (req, res) => {
  res.render("login", { new_title: "Login Page" });
});

router.get("/register", (req, res) => {
  res.render("register", { new_title: "Register Page" });
});
router.post("/register", registerUser);

router.post("/login", userLogin);

module.exports = router;
