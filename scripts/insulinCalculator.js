function calculate_required_insulin(carbsPer100, gramsOnScale, insulinRatio) {
    const carbsPerGram = carbsPer100 / 100;
    const totalGramsCarbs = carbsPerGram * gramsOnScale;
    const insulinNeeded = (totalGramsCarbs / 10) * insulinRatio;

    return {
      "totalCarbs": totalGramsCarbs,
      "insulinRequired": insulinNeeded
    };
  }

  $(document).ready(() => {
    $('#clearInputs').on('click', () => {
      $('#carbsPer100').val('');
      $('#gramsOnScale').val('');
      $('#insulinRatio').val('');

      $('#carbsResult').text('');
      $('#insulinResult').text('');
    });
    $('#calculateInsulin').on('click', () => {
      const carbsPer100 = $('#carbsPer100').val();
      const gramsOnScale = $('#gramsOnScale').val();
      const insulinRatio = $('#insulinRatio').val();
      const result = calculate_required_insulin(carbsPer100, gramsOnScale, insulinRatio);

      $('#carbsResult').text(`Total carbs: ${result['totalCarbs']}.`);
      $('#insulinResult').text(`Insulin required: ${result['insulinRequired']}.`);
    });
  });