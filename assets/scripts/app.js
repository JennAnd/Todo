const taskButton = document.querySelectorAll('.task-button');
const hiddenTasks = document.querySelector('.hidden');

taskButton.forEach((taskButtons) => {
  taskButtons.addEventListener('click', () => {
    hiddenTasks.classList.toggle('on');
  });
});