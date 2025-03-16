

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Ha Ön beteg
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Ha Ön kíváncsi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Tudástár
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Eredmények
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" >
                    Rólunk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Adatvédelem
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item dropdown">
                <form method="get">
                        <select name="language" id="dropdown-select"  class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <option class="dropdown-item" value="hu">Magyar</option>
                                <option class="dropdown-item" value="en">Angol</option>
                                <option class="dropdown-item" value="de">Német</option>
                        </select>
                    
                </form>
            </li>
        </ul>
    </nav>
    <script>

        // ha az egész HTML file betöltődött
        $(document).ready(function() {

            // a select tag-et elmentjük változóként
            var select = $('#dropdown-select');
            select.on('change', function() {

                // ha változik a selectált érték
                var selectedLanguage = $(this).val();
                console.log("Kiválaszottad: ", selectedLanguage);
                $.ajax({

                    // ajax-al átküldjük a kiválasztott értéket (hu,en,de)
                    // a process_language.php-nak
                    url: 'process_language.php',
                    type: 'GET',
                    data: { language: selectedLanguage},
                    success: function(response) {
                        console.log("Sikeres: ", response);

                        // szét fetcheljük a kapott JSON-t egy tömbbé
                        var nav = JSON.parse(response);
                        
                        // behelyettesítjük a megfelelő helyre a navbar-on belül
                        $('.nav-link').eq(0).text(nav[0]);
                        $('.nav-link').eq(1).text(nav[1]);
                        $('.nav-link').eq(2).text(nav[2]);
                        $('.nav-link').eq(3).text(nav[3]);
                        $('.nav-link').eq(4).text(nav[4]);
                        $('.nav-link').eq(5).text(nav[5]);
                        $('.nav-link').eq(6).text(nav[6]);
                        $('.dropdown-item').eq(0).text(nav[7]);
                        $('.dropdown-item').eq(1).text(nav[8]);
                        $('.dropdown-item').eq(2).text(nav[9]);
                    },
                    error: function(xhr, status, error) {
                        console.error("Hiba: ", status, error);
                    }
                });
            });
        });
    </script>
</body>
</html>
