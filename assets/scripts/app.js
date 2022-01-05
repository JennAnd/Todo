const taskButton = document.querySelectorAll('.task-button');
const hiddenTasks = document.querySelector('.hidden-tasks');
const hiddenForm = document.querySelector('.hidden-form');

taskButton.forEach((taskButtons) => {
  taskButtons.addEventListener('click', () => {
    hiddenTasks.classList.toggle('show-tasks');
  });
});

taskButton.forEach((taskButtons) => {
    taskButtons.addEventListener('click', () => {
      hiddenForm.classList.toggle('show-form');
    });
  });