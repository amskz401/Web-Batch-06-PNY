const express = require("express");
const routes = require("./routes/web");

const app = express();

const PORT = 8000;

// Set Default Template Engine
app.set("view engine", "ejs");

app.get("/", (req, res) => {
  res.render("index");
});

app.get("/about", (req, res) => {
  res.render("about");
});

app.get("/contact", (req, res) => {
  res.send("<h1>This is about page</h1>");
});

app.listen(PORT, () => {
  console.log("Server Started");
});
