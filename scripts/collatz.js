function collatz() {
    let steps = 0;
    let number = $('#number').val();
    let max = number;

    while (number > 1) {
      if (number > max) {
        max = number;
      }
      if (number % 2 == 0) {
        number = number / 2;
        steps++;
      } else {
        number = (3 * number) + 1;
        steps++;
      }
    }

    return {
      "steps": steps,
      "max": max
    };
  }

  $(document).ready(() => {
    $('#calculateCollatz').on('click', () => {
      const number = $('#number').val();
      const result = collatz(number);

      $('#collatzStepsResult').text(`Number of steps: ${result['steps']}.`);
      $('#collatzMaxResult').text(`Max number reached: ${result['max']}.`);
    });
  });