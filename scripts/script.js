const homeDiv = document.getElementById("home-div");
const insulinCalculatorDiv = document.getElementById("insulin-calculator-div");
const nameGeneratorDiv = document.getElementById("name-generator-div");
const diceRollerDiv = document.getElementById("dice-roller-div");

const divElements = [homeDiv, insulinCalculatorDiv, nameGeneratorDiv, diceRollerDiv];

divElements.forEach(element => {
    element.style.display = "none";
});

homeDiv.style.display = "block";

const titleNav = document.getElementById("title-nav");
const homeNav = document.getElementById("home-nav");
const insulinCalculatorNav = document.getElementById("insulin-calculator-nav");
const nameGeneratorNav = document.getElementById("name-generator-nav");
const diceRollerNav = document.getElementById("dice-roller-nav");

const navElements = [titleNav, homeNav, insulinCalculatorNav, nameGeneratorNav, diceRollerNav];

navElements.forEach(element => {
    alert(element);
});