const express = require("express");
const expressLayouts = require("express-ejs-layouts");
const mongoose = require("mongoose");
require("./server/config/db");

const productSchema = new mongoose.Schema({
  title: String,
  price: Number,
  stock: Number,
});
const Product = mongoose.model("Products", productSchema);

const app = express();

const PORT = 3000;

// Layout settings
app.set("view engine", "ejs");
app.use(expressLayouts);
app.set("layout", "./layouts/app");

// Get Data from user
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.get("/", (req, res) => {
  // return view("index", $data);
  const data = Product.find();
  //   res.render("index", { new_title: "Home Page", products: data });

  Product.find()
    .then((data) => {
      console.log(data);
      res.render("index", { new_title: "Home Page", products: data });
    })
    .catch((error) => {
      console.log(error);
      res.end();
    });
});

app.get("/add-product", (req, res) => {
  // return view("index", $data);
  res.render("add-product", { new_title: "Product Page" });
});

app.post("/post-product", (req, res) => {
  add_product = new Product(req.body);
  //   await add_product.save();

  add_product
    .save()
    .then((data) => {
      console.log(data);
    })
    .catch((error) => {
      console.log(error);
    });

  res.redirect("/");
});

app.listen(PORT, () => {
  console.log(`Server started at: ${PORT}`);
});
