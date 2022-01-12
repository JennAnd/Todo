<img src="https://media.giphy.com/media/3o6MbhbYBsqTrbP2qQ/giphy.gif">

# Todo

This website will help you organize your life. You can create your To-do list with lists and tasks.
Follow the link to visit my site: https://github.com/JennAnd/Todo.

# Installation

    1. Clone the repository Todo from my GitHub: JennAnd/Todo.
    2. Start a localhost server to view my project: localhost:8000.
    3. Add /index.php at the end of the URL. Now you have access.


# Code Review

Code review written by [Sofia Dersén](https://github.com/dersen).

1. `Overall` - No comments at all makes it hard to follow your code.

2. `Overall` - No error-messages makes it difficult to understand what is happening as a user. Can be done by adding a `$_SESSION[‘message’][] = “A great message;`. Then in the file that the user "sees" check if `$_SESSION[‘message’]` is set and if it is, echo the message.

3. `Overall` - No sanitize on any echos (for example `htmlspecialchars()`) from the database.

4. `app/user/Register.php:29` - You are setting the $password to the password given by the user. Which menas you are sending a non-hashed password to the db. This can be solved by not redeclaring `$password` but do the `strlen()` on `$_POST['password']` directly.

5. `app/user/Register.php` - Perhaps it would be nice to check if a user already exists when creating a new user. Can be done by first checking if the email already exists in db.

6. `App/user/update/email.php` - Same comment as above.

7. `App/user/update/email.php:18` - Could be nice for readability if an `$id` variable is set.

8. `App/user/update/uploads.php` - Perhaps it would be nice with some kind of back-end validation of the image format. This could be made by an if-statment that checks if `$_file[‘type’]` is .png or .jpeg.

9. `Create.php:63` - Better readability to name `$tasks as `$task` instead of `$tasks as $taskFetch`

10. `Create.php-122 and 130` - It would be good with a max length of these to avoid the possibility for too long texts. At front end it can be done by adding a maxlegth to your input field.

11. `Deadlines-today:29` - Beter readability to name `$taskDeadlines as $taskDeadline` (instead of `$taskDeadline as $taskDeadlines`).

# Testers

Tested by the following people:

1. Johanna Jönsson
2. Hanna Rosenberg
