const { MongoClient } = require("mongodb");
const url = "mongodb://localhost:27017";
const client = new MongoClient(url);

const dbName = "MongoDB_NEW";

async function main() {
  // Use connect method to connect to the server
  await client.connect();
  console.log("Connected successfully to server");
  const db = client.db(dbName);
  const collection = db.collection("users");

  const users = await collection.find({ name: "ali" }).toArray();
  console.log(users);

  // the following code examples can be pasted here...
}

main()
  .then(console.log)
  .catch(console.error)
  .finally(() => client.close());
