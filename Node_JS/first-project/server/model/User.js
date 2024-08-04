const mongoose = require("mongoose");
const userSchema = new mongoose.Schema({
  first_name: String,
  last_name: String,
  user_email: String,
  password: String,
  status: Boolean,
  user_type: String,
  createAt: {
    type: Date,
    default: Date.now(),
  },
  updateAt: {
    type: Date,
    default: Date.now(),
  },
});
module.exports = mongoose.model("Users", userSchema);
