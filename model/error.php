<!DOCTYPE html>
<html>

    <!-- the head section -->
    <head>
        <title>Dr.Book</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>

    <!-- the body section -->
    <body>
        <header><h1>Dr.Book</h1></header>

        <main>
            <h2 class="top">Error</h2>
            <p><?php echo $error; ?></p>
        </main>

        <footer>
            <p>&copy; <?php echo date("Y"); ?> Dr.Book, Inc.</p>
        </footer>
    </body>
</html>