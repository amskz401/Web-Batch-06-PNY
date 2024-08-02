const mongoose = require("mongoose");
mongoose
  .connect("mongodb://localhost:27017/farhan_store")
  .then(() => console.log("Connected!"));
