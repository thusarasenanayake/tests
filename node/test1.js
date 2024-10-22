function test() {
  const form = new FormData();
  const object = {
    name: "Annie",
  };
  const string = "form test";
  const number = 0;

  form.append("name", "Annie");

  addFormData(form, string, number, object);

  console.log(Object.fromEntries(form));
  console.log(string);
  console.log(number);
  console.log(object);
}

function addFormData(form, string, number, object) {
  form.append("age", 26);
  string = "";
  number = 1;
  object.age = 26;
}

test();
