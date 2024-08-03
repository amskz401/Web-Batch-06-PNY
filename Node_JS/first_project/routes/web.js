const express = require("express");

const router = express.Router();

router.get("/", (req, res) => {
  res.render("index");
});

router.get("/about", (req, res) => {
  res.render("about");
});

router.get("/contact", (req, res) => {
  res.send("<h1>This is about page</h1>");
});

module.exports = router;
