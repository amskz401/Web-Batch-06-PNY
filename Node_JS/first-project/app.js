const express = require("express");
const expressLayouts = require("express-ejs-layouts");
const mongoose = require("mongoose");
const multer = require("multer");
require("dotenv").config();

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

app.use("/", require("./routes/product"));

app.listen(PORT, () => {
  console.log(`Server started at: ${PORT}`);
});
