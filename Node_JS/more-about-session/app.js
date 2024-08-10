const express = require("express");
const expressLayouts = require("express-ejs-layouts");
const sessions = require("express-session");
const flash = require("express-flash");
const mysql = require("mysql");
var connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "node_js_db",
});
connection.connect();

const app = express();
const PORT = 3000;

app.use(expressLayouts);
app.set("view engine", "ejs");
app.set("layout", "./layouts/main");

// Get Data from user
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.use(
  sessions({
    secret: "general-purpose",
    resave: false,
    saveUninitialized: true,
    cookie: {
      maxAge: 36000,
    },
  })
);
app.use(flash());
app.use((req, res, next) => {
  if (req.session.user) {
    res.locals.user = req.session.user;
  } else {
    res.locals.user = {
      first_name: "Guest",
      email: "guest@m.com",
    };
  }
  next();
});

app.get("/", (req, res) => {
  res.render("index");
});

app.get("/new-link", (req, res) => {
  res.render("new-link");
});

app.post("/set-session", (req, res) => {
  req.session.regenerate(function (err) {
    if (err) next(err);

    // store user information in session, typically a user id
    req.session.user = {
      first_name: req.body.search_value,
      email: "farhan@m.com",
      phone: "35435345434",
    };

    console.log(req.session);

    // save the session before redirection to ensure page
    // load does not happen before session is saved
    req.session.save(function (err) {
      if (err) return next(err);
      res.redirect("/");
    });
  });
});

app.get("/users", (req, res) => {
  connection.query("SELECT * FROM users", function (error, results, fields) {
    if (error) throw error;
    res.render("users", { data: results });
  });
});

app.get("/delete-user/:id", (req, res) => {
  connection.query(
    "DELETE FROM users WHERE id = ?",
    [req.params.id],
    function (error, results, fields) {
      if (error) throw error;

      req.flash("info", "Your record deleted successfully");
      res.redirect("/users");
    }
  );
});

app.listen(PORT, () => {
  console.log(`Server Started at: ${PORT}`);
});
