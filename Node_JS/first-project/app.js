const express = require("express");
const expressLayouts = require("express-ejs-layouts");
const mongoose = require("mongoose");
const multer = require("multer");
require("dotenv").config();
const session = require("express-session");
const flash = require("express-flash");

const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, "public/images");
  },
  filename: function (req, file, cb) {
    const uniqueSuffix = Date.now() + "-" + Math.round(Math.random() * 1e9);
    cb(null, file.fieldname + "-" + uniqueSuffix + ".jpg");
  },
});
const upload = multer({ storage: storage });

require("./server/config/db");

const app = express();

app.use(
  session({
    secret: "user-login-session",
    resave: false,
    saveUninitialized: true,
  })
);

app.use(flash());

app.use((req, res, next) => {
  res.locals.logged_in = {
    first_name: "Guest",
    status: false,
  };
  next();
});

// middleware to test if authenticated
function isAuthenticated(req, res, next) {
  if (req.session.user) {
    res.locals.logged_in = {
      log_user: req.session.user,
      status: true,
    };
    next();
  } else {
    res.redirect("/login");
  }
}

function is_admin(req, res, next) {
  if (req.session.user.user_type == "admin") next();
  else res.redirect("/");
}

const PORT = process.env.PORT || 4000;

// Static Path
app.use(express.static("public"));

// Layout settings
app.set("view engine", "ejs");
app.use(expressLayouts);
app.set("layout", "./layouts/app");

// Get Data from user
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// app.user( (req, res, next) => {
//   res.
// } )

// default page
app.get("/", (req, res) => {
  res.render("home", { new_title: "Home Page" });
});

app.get("/logout", (req, res) => {
  req.session.user = null;
  req.session.save(function (err) {
    if (err) next(err);
    // regenerate the session, which is good practice to help
    // guard against forms of session fixation
    req.session.regenerate(function (err) {
      if (err) next(err);
      res.redirect("/");
    });
  });
});

// Product Routes
app.use("/admin", isAuthenticated, is_admin, require("./routes/product"));

// User Routes
app.use("/", require("./routes/user"));

app.listen(PORT, () => {
  console.log(`Server started at: ${PORT}`);
});
