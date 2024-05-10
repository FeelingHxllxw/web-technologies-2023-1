pizzaTypes = {
  Маргарита: [500, 300],
  Пепперони: [800, 400],
  Баварская: [700, 450],
};
sizes = {
  Большая: [200, 200],
  Маленькая: [100, 100],
};
toppings = {
  "Сырный борт": [150, 50],
  "Сливочная моцарелла": [50, 20],
  "Чеддр и пармезан": [150, 50],
};

class Pizza {
  constructor(name, size, topping, price, calorie) {
    this.name = name;
    this.size = size;
    this.topping = [];
    this.price = 0;
    this.calorie = 0;
  }
  getPrice() {
    return this.price;
  }
  getCalorie() {
    return this.calorie;
  }
  addTopping(newTopping) {
    this.topping.push(newTopping);
    this.calcCalorie();
    this.calcPrice();
  }
  removeTopping(oldTopping) {
    this.calcCalorie();
    this.calcPrice();
    let toppingPrice = oldTopping[0];
    let toppingCalorie = oldTopping[1];
    this.size == "Большая"
      ? (this.price -= toppingPrice * 2)
      : (this.price -= toppingPrice);
    this.calorie -= toppingCalorie;
    let index = this.topping.findIndex((top) => top === oldTopping);
    this.topping.splice(index, 1);
    this.calcCalorie();
    this.calcPrice();
  }

  calcPrice() {
    this.price = 0;
    this.price += pizzaTypes[this.name][0];
    this.price += sizes[this.size][0];
    let size = this.size;

    this.topping.forEach((item) => {
      size == "Большая"
        ? (this.price += toppings[item][0] * 2)
        : (this.price += toppings[item][0]);
    });

    document.getElementById(
      "add-2-cart"
    ).textContent = `${customPizza.getPrice()} руб., (${customPizza.getCalorie()} кКал)`;
  }
  calcCalorie() {
    this.calorie = 0;
    this.calorie += pizzaTypes[this.name][1];
    this.calorie += sizes[this.size][1];
    let size = this.size;

    this.topping.forEach((item) => {
      size == "Большая"
        ? (this.calorie += toppings[item][1] * 2)
        : (this.calorie += toppings[item][1]);
    });
    document.getElementById(
      "add-2-cart"
    ).textContent = `${customPizza.getPrice()} руб., (${customPizza.getCalorie()} кКал)`;
  }
  getToppings() {
    return this.topping;
  }
  getSize() {
    return this.size;
  }
  getStuffing() {
    return this.name;
  }
}
let customPizza;
function choosePizza(chosenPizza) {
  document
    .querySelectorAll(".topping-item")
    .forEach((item) => (item.style.border = ""));
  customPizza = chosenPizza;
  document
    .querySelectorAll(".pizza-item")
    .forEach((item) => (item.style.border = ""));
  document.getElementById(chosenPizza.getStuffing()).style.border =
    "5px solid orange";
  customPizza.calcCalorie();
  customPizza.calcPrice();
}
function actTop(toppingOption) {
  if (!customPizza.topping.includes(toppingOption)) {
    console.log(customPizza.topping);
    addTop(toppingOption);
  } else {
    remTop(toppingOption);
  }
}
function remTop(toppingName) {
  customPizza.removeTopping(toppingName);
  document.getElementById(toppingName).style.border = "0px solid orange";
}
function addTop(toppingName) {
  customPizza.addTopping(toppingName);
  document.getElementById(toppingName).style.border = "5px solid orange";
}

function resizePizza() {
  document.getElementById("radioS").checked == "1"
    ? (customPizza.size = "Маленькая")
    : (customPizza.size = "Большая");

  customPizza.calcCalorie();
  customPizza.calcPrice();
}
