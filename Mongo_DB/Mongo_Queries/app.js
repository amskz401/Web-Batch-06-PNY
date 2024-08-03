const { MongoClient } = require("mongodb");

const url = "mongodb://localhost:27017";
const client = new MongoClient(url);

const dbName = "MongoDB_NEW";

async function main() {
  // Use connect method to connect to the server
  await client.connect();
  console.log("Connected successfully to server");
  const db = client.db(dbName);
  const users = db.collection("users");

  // const result = await db.collection("users").insertMany([
  //   {
  //     item: "journal",
  //     qty: 25,
  //     tags: ["blank", "red"],
  //     size: { h: 14, w: 21, uom: "cm" },
  //   },
  //   {
  //     item: "mat",
  //     qty: 85,
  //     tags: ["gray"],
  //     size: { h: 27.9, w: 35.5, uom: "cm" },
  //   },
  //   {
  //     item: "mousepad",
  //     qty: 25,
  //     tags: ["gel", "blue"],
  //     size: { h: 19, w: 22.85, uom: "cm" },
  //   },
  // ]);
  // select * from users; User::get();
  // await db.collection("users").updateOne(
  //   { qty: 85, item: "mat" },
  //   {
  //     $set: { qty: 2550 },
  //   }
  // );

  // await db.collection("users").deleteOne({ qty: 2550 });

  // await db
  //   .collection("users")
  //   .updateOne({ qty: 50 }, { $unset: { key: "item" } });

  // const users_data = await users
  //   .find({ _id: ObjectId("66a4f9ba8e57f418df4645ec") })
  //   .toArray();
  // console.log(users_data);

  // const users_data = await users.find().sort({ qty: 1 }).toArray();
  // const users_data = await users.find().sort({ qty: -1 }).toArray();
  // const users_data = await users.find().limit(1).toArray();
  // const users_data = await users.find().skip(3).toArray();
  // const users_data = await users.find({ qty: 50 }).toArray();
  // const users_data = await users.find({}, { qty: false }).toArray();
  const users_data = await users
    .find({ $or: [{ item: "mat", qty: 50 }] })
    .toArray();

  console.log(users_data);

  // the following code examples can be pasted here...
}

main()
  .then(console.log)
  .catch(console.error)
  .finally(() => client.close());
