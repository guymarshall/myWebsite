function calculateRequiredInsulin(carbsPer100, gramsOnScale, insulinRatio) {
    const carbsPerGram = carbsPer100 / 100;
    const totalGramsCarbs = carbsPerGram * gramsOnScale;
    const insulinNeeded = (totalGramsCarbs / 10) * insulinRatio;

    return {
        totalCarbs: totalGramsCarbs,
        insulinRequired: insulinNeeded
    };
}

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('clearInputs').addEventListener('click', () => {
        document.getElementById('carbsPer100').value = '';
        document.getElementById('gramsOnScale').value = '';
        document.getElementById('insulinRatio').value = '';

        document.getElementById('carbsResult').textContent = '';
        document.getElementById('insulinResult').textContent = '';
    });

    document.getElementById('calculateInsulin').addEventListener('click', () => {
        const carbsPer100 = parseFloat(document.getElementById('carbsPer100').value);
        const gramsOnScale = parseFloat(document.getElementById('gramsOnScale').value);
        const insulinRatio = parseFloat(document.getElementById('insulinRatio').value);

        if (!isNaN(carbsPer100) && !isNaN(gramsOnScale) && !isNaN(insulinRatio)) {
            const result = calculateRequiredInsulin(carbsPer100, gramsOnScale, insulinRatio);

            document.getElementById('carbsResult').textContent = `Total carbs: ${result.totalCarbs}.`;
            document.getElementById('insulinResult').textContent = `Insulin required: ${result.insulinRequired}.`;
        } else {
            alert('Please enter valid numeric values for all inputs.');
        }
    });
});