<!doctype html>
<html lang="en">
    <head>
        <title>Search in excel file</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="https://img.icons8.com/nolan/64/search.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class='alert alert-info pl-5'>
            This page can be buggy sometimes, so it is requested to refresh this page if any problem occurs with this page or the related pages.
        </div>
        <form class="form-group m-5 p-5" method="post" enctype="multipart/form-data" style="border: solid thin black" action="displaySearchResult.php" target="_blank">
            <h2>Excel Searcher</h2>
            <hr>
            <label for="ExcelFile" class = "h5">Input your excel file:</label>
            <input type="file" class="form-control-file" name="ExcelFile" id="ExcelFile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
            <small id="fileHelpId" class="form-text text-muted">Only excel files are taken in.</small>
            <hr>
            <label for="searchCode" class = "h5">Enter the string to search:</label><br>
            <input type="text" class="form-control" name="searchCode" id="searchCode" placeholder="Enter the string to search" value="" required>
            <hr>
            <div class="form-group form-check">
                <input type="checkbox" name="advSearch" id="advSearch" class="form-check-input">
                <label for="advSearch" class="form-check-label">Advance Search</label>
                <br>
                <input type="checkbox" name="caseInsensitive" id="caseInsensitive" class="form-check-input">
                <label for="caseInsensitive" class="form-check-label">Case Insensitive Search</label>
            </div>
            <hr>
            <input type="submit" onClick="window.location.href=window.location.href" class="btn btn-primary form-control" name="uploadAndSearchFile" value="Search">
        </form>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
