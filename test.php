1. Om ni vill ha flera olika typer av meddelanden i era sessions kan ni spara varje meddelande som en array där ni indikerar vilken typ av meddelande det är:
```php
$_SESSION['messages'][] = [
'text' => 'Whoops',
'type' => 'error',
];

2. //if you already are a member, säg nåt så att man får gå till already a memebr, log in instead//

3. Uppdatera och nolla sidan på login och create an accout//

4. <button type="submit">Upload</button>??

5. //Få in bilden i databasen//

6. //verify password//



//////////////////////
i delete.php

<?php

declare(strict_types=1);

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $database = new PDO('sqlite:../startrek.db');

    $query = sprintf('DELETE FROM characters WHERE id = %d', $id);

    $statement = $database->query($query);
}

header('Location: /');
