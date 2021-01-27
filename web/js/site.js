"use strict";

const NUMBER_RANGE = 5;
const NUMBER_COUNT = 15;

async function getNumbers() {
    const numbers = [];

    for (let i = 0; i < NUMBER_COUNT; i++) {
        numbers[i] = Math.round(Math.random() * NUMBER_RANGE);
    }

    const number = Math.round(Math.random() * NUMBER_RANGE);

    const data = {
        numbers,
        number,
    };

    const response = await fetch('api/number/get-number-index', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    });

    if (response.ok) {
        const numberIndex = await response.json();

        const numbersStr = numbers.map((value, index) => index === numberIndex ? value = ' ||| ' + value : value)
            .join(', ');

        $('#number').text('Число: ' + number);
        $('#numbers').text(numbersStr);
        $('#message').text(numberIndex === -1 ? 'Позиция не определена' : '');
    } else {
        $('#number').text('');
        $('#numbers').text('');
        $('#message').text(response.statusText);
    }
}

$(function() {
    $('#send-button').click(() => getNumbers());
});
