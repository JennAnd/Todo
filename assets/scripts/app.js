const form = document.querySelector('.completed-tasks');
    const task = document.querySelector('input[type=checkbox]');

    // When the user clicks on the checkbox the form will automagically submit.
    task.addEventListener('click', () => form.submit());