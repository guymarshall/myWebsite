function getDieRolls(numberOfDice, numberOfSides) {
    const rolls = [];
    for (let i = 0; i < numberOfDice; i++) {
        const roll = Math.floor(Math.random() * numberOfSides) + 1;
        rolls.push(roll);
    }
    return rolls;
}

function isNumeric(input) {
    return /^\d+$/.test(input);
}

function submit() {
    const numberOfDice = document.getElementById('number-of-dice').value;
    const numberOfSides = document.getElementById('number-of-sides').value;

    if (!isNumeric(numberOfDice) || Math.floor(numberOfDice) === numberOfDice || numberOfDice <= 0) {
        return alert('Please enter a valid whole number for number of dice.');
    }

    if (!isNumeric(numberOfSides) || Math.floor(numberOfSides) === numberOfSides || numberOfSides <= 0) {
        return alert('Please enter a valid whole number for number of sides.');
    }

    const dieRolls = getDieRolls(numberOfDice, numberOfSides);

    alert(dieRolls);
}

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('roll-dice').addEventListener('click', () => {
        submit();
    });
});