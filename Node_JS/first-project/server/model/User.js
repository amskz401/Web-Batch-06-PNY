const mongoose = require("mongoose");
const userSchema = new mongoose.Schema({
  first_name: String,
  last_name: Number,
  email: Number,
  password: String,
});
module.exports = mongoose.model("Users", userSchema);
