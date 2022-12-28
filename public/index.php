<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/dist/site.css">
    <script src="https://unpkg.com/htmx.org@1.8.4"></script>
</head>
<body class="bg-gray-400 py-4">
    <div class="container mx-auto bg-gray-200 px-6">
        <?php if(isset($_POST['submit'])): ?>
            <p class="text-xl py-4">Hello <?php echo htmlentities($_POST['name'] ?? 'nameless') ?>, we'll see you on <?php echo htmlentities($_POST['date'] ?? 'unknown') ?>!</p>
            <p class="py-4" hx-boost="true">Would you like to <a href="/" class="underline">submit another date</a>?</p>
        <?php else: ?>        
            <form action="/" method="post" class="grid grid-cols-2 gap-4 py-4 w-2/5">
                <label for="name">Your name</label>
                <input type="text" name="name" class="p-1" required="required">
                <label for="date">Select date</label>
                <div id="datepicker">
                    <input type="text" name="date" class="p-1" id="dateinput" readonly required="required">
                    <button
                        type="button"
                        class="bg-slate-600 text-white p-1"
                        hx-get="/datepicker.php"
                        hx-target="#datepicker-widget"
                        >Pick a date</button>
                    <div id="datepicker-widget"></div>
                </div>
                <div class="text-right col-span-2">
                    <input type="submit" name="submit" value="submit" class="w-1/4 bg-slate-600 text-white p-1">
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>