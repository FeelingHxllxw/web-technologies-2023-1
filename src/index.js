class Pizza {
    constructor(name, price, calories) {
      this.name = name;
      this.price = price;
      this.calories = calories;
      this.toppings = [];
      this.size = null;
    }
  
    addTopping(topping) {
      this.toppings.push(topping);
    }
  
    removeTopping(topping) {
      this.toppings = this.toppings.filter((t) => t !== topping);
    }
  
    getSize() {
      return this.size;
    }
  
    setSize(size) {
      this.size = size;
      this.price += size.price;
      this.calories += size.calories;
    }
  
    calculatePrice() {
      return this.price + this.toppings.reduce((total, t) => total + t.price, 0);
    }
  
    calculateCalories() {
      return (
        this.calories +
        this.toppings.reduce((total, t) => total + t.calories, 0)
      );
    }
  }
  
  class PizzaSize {
    constructor(name, price, calories) {
      this.name = name;
      this.price = price;
      this.calories = calories;
    }
  }
  
  class Topping {
    constructor(name, price, calories) {
      this.name = name;
      this.price = price;
      this.calories = calories;
    }
  }
  

  
  const margherita = new Pizza("Маргарита", 500, 300);
  const pepperoni = new Pizza("Пепперони", 800, 400);
  const bavarian = new Pizza("Баварская", 700, 450);
  
  const largeSize = new PizzaSize("Большая", 200, 200);
  const smallSize = new PizzaSize("Маленькая", 100, 100);
  
  const mozzarella = new Topping("Cливочная моцарелла", 50, 20);
  const cheeseEdgeSmall = new Topping("Cырный борт для маленькой", 150, 50);
  const cheeseEdgeLarge = new Topping("Сырный борт для большой", 300, 50);
  const cheddarParmesanSmall = new Topping("Чедер и пармезан для маленькой", 150, 50);
  const cheddarParmesanLarge = new Topping("Чедер и пармезан для большой", 300, 50);
  

  
  margherita.setSize(largeSize);
  margherita.addTopping(mozzarella);
  margherita.addTopping(cheeseEdgeLarge);
  
  pepperoni.setSize(smallSize);
  pepperoni.addTopping(cheeseEdgeSmall);
  pepperoni.addTopping(cheddarParmesanSmall);
  
  bavarian.setSize(largeSize);
  bavarian.addTopping(mozzarella);
  bavarian.addTopping(cheeseEdgeLarge);
  bavarian.addTopping(cheddarParmesanLarge);
  

  
  console.log(margherita.calculatePrice()); 
  console.log(margherita.calculateCalories()); 
  
  console.log(pepperoni.calculatePrice()); 
  console.log(pepperoni.calculateCalories()); 
  
  console.log(bavarian.calculatePrice());
  console.log(bavarian.calculateCalories()); 