function pickproparray(array, prop) {
  let res = [];
  for (let index = 0; index < array.length; index++) {
    let element = array[index];
    if (element.hasOwnProperty(prop)) {
      res.push(element[prop]);
    }
  }
  return res;
}

const students = [
  { name: "Павел", age: 20 },
  { name: "Иван", age: 20 },
  { name: "Эдем", age: 20 },
  { name: "Денис", age: 20 },
  { name: "Виктория", age: 20 },
  { age: 40 },
];
const res = pickproparray(students, "name");
console.log(res);

function createcounter() {
  let count = 0;
  return function () {
    count++;
    console.log(count);
  };
}

const counter1 = createcounter();
counter1();
counter1();

const counter2 = createcounter();
counter2();
counter2();

function spinwords(str) {
  const words = str.split(" ");
  for (let index = 0; index < words.length; index++) {
    if (words[index].length >= 5) {
      words[index] = words[index].split("").reverse().join("");
    }
  }
  return words.join(" ");
}

let result1 = spinwords("Привет от Legacy");
console.log(result1);

let result2 = spinwords("This is a test");
console.log(result2);

function GetIndex(nums, target) {
  let result = [];
  for (let i = 0; i < nums.length; i++) {
    let pair = [];
    const temp = nums[i];
    for (let j = i + 1; j < nums.length; j++) {
      if (i < j && temp + nums[j] == target) {
        pair.push(i);
        pair.push(j);
      }
    }
    if (pair.length != 0) result.push(pair);
  }
  return result;
}

nums = [2, 7, 11, 12, -3];
target = 9;
console.log(GetIndex(nums, target));

function GetMinElement(array) {
  const patternWord = /[А-Яа-яA-Za-z]{2,}/g;

  if (array.length == 0) {
    return "";
  }
  if (array.length == 1) {
    return array[0];
  }
  arr = array.join(" ");
  let minElement = arr.match(patternWord);

  if (minElement == null) return null;
  if (minElement.length >= 2) minElement.sort();
  return minElement[0];
}

function GetPrefix(array) {
  if (array.length == 0) {
    return "";
  }

  const minWord = GetMinElement(array);
  if (minWord == null) {
    return "";
  }
  const result = [];
  for (let i = 0; i < minWord.length - 1; i++) {
    const pattern = minWord.substring(i, minWord.length);
    let flag = true;
    for (let j = 0; j < array.length; j++) {
      const element = array[j];
      if (element.includes(pattern) == false) {
        flag = false;
        break;
      }
    }
    if (flag) {
      result.push(pattern);
      break;
    }
  }

  for (let i = minWord.length; i > 1; i--) {
    const pattern = minWord.substring(0, i);

    let flag = true;
    for (let j = 0; j < array.length; j++) {
      const element = array[j];
      if (element.includes(pattern) == false) {
        flag = false;
        break;
      }
    }
    if (flag) {
      result.push(pattern);
      break;
    }
  }

  if (result.length == 2) {
    if (result[0].length >= result[1].length) {
      return result[0];
    }
    return result[1];
  }

  return result.length == 1 ? result[0] : "";
}

const patternWord = /[А-Яа-яA-Za-z]+/g;

strs1 = ["цветок", "поток", "хлопок"];
strs2 = ["собака", "гоночная машина", "машина"];

console.log("Test 1 = ", GetPrefix(strs1));
console.log("------------");
console.log("Test 2 = ", GetPrefix(strs2));
