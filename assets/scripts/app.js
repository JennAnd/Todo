const form = document.querySelector('.completed-tasks');
const task = document.querySelectorAll('input[type=checkbox]');

function allTodaysDeadlines(event) {
    event.target.parentNode.submit();
}
task.forEach((tasks) => {
    // When the user clicks on the checkbox the form will automagically submit.
    tasks.addEventListener('click', allTodaysDeadlines);
});
