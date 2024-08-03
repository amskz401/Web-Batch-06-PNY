const express = require("express");
const router = express.Router();
const ProductController = require("../server/controller/prodcutController");

const multer = require("multer");

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

router.get("/", ProductController.list_products);

router.get("/add-product", ProductController.add_product);

router.post(
  "/post-product",
  upload.single("image"),
  ProductController.post_product
);

router.get("/edit-product/:_id", ProductController.edit_product);

router.post("/update-product", ProductController.update_product);

router.get("/del-product/:_id", ProductController.delete_product);

module.exports = router;
