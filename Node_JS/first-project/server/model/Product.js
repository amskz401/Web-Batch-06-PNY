const mongoose = require("mongoose");
const productSchema = new mongoose.Schema({
  title: String,
  price: Number,
  stock: Number,
  image: String,
});
module.exports = mongoose.model("Products", productSchema);
