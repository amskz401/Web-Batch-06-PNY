const Product = require("../model/Product");

const list_products = (req, res) => {
  Product.find()
    .then((data) => {
      console.log(data);
      res.render("index", { new_title: "Home Page", products: data });
    })
    .catch((error) => {
      console.log(error);
      res.end();
    });
};

const add_product = (req, res) => {
  // return view("index", $data);
  res.render("add-product", { new_title: "Product Page" });
};

const post_product = (req, res) => {
  // console.log(req);
  const add_data = {
    title: req.body.title,
    price: req.body.price,
    stock: req.body.stock,
    image: req.file.filename,
  };

  console.log(add_data);

  add_new = new Product(add_data);
  // await add_product.save();

  add_new
    .save()
    .then((product) => {
      console.log(product);
    })
    .catch((error) => {
      console.log(error);
    });

  res.redirect("/");
};

const edit_product = async (req, res) => {
  const product = await Product.findOne(req.params);
  console.log(product);

  res.render("edit-product", { new_title: "Edit Product", product: product });
};

const update_product = (req, res) => {
  const new_data = {
    title: req.body.title,
    price: req.body.price,
    stock: req.body.stock,
  };
  Product.updateOne(
    { _id: req.body._id },
    {
      $set: new_data,
    }
  )
    .then((data) => {
      res.redirect("/");
    })
    .catch((error) => {
      console.log(error);
    });
};

const delete_product = async (req, res) => {
  await Product.deleteOne(req.params);
  res.redirect("/");
};

module.exports = {
  list_products,
  add_product,
  post_product,
  edit_product,
  update_product,
  delete_product,
};
