<?php
    if(!isset($_POST['uploadAndSearchFile'])){
        die("Nothing to do here. Please goto the <a href='index.php'>this</a> page.");
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Search Result</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="icon" href="https://img.icons8.com/plasticine/100/000000/urine-collection.png">
    </head>
    
    <body>
        <?php
            if(isset($_POST['uploadAndSearchFile'])){
                $givenFile = $_FILES['ExcelFile']['name'];
                $fileSaveLocation = "ExcelFiles/temp.".pathinfo($givenFile, PATHINFO_EXTENSION);
                $search = $_POST['searchCode'];
                $needsAdvanceSearch = isset($_POST['advSearch'])?true:false;
                $isCaseInsensitive = isset($_POST['caseInsensitive'])?true:false;
                if(move_uploaded_file($_FILES['ExcelFile']['tmp_name'], $fileSaveLocation)){
                    readNewlyUploadedFile($fileSaveLocation, $search, $needsAdvanceSearch, $isCaseInsensitive);
                }else{
                    echo "<div class='alert alert-danger'>Error processing the given file.</div>";
                }
            }
            function readNewlyUploadedFile($fileSaveLocation, $search, $needsAdvanceSearch, $isCaseInsensitive){
                include "SimpleXLSX.php";
                $row = 0;
                $col = 'A';
                $SN = 0;
                if ( $file = SimpleXLSX::parse($fileSaveLocation) ) {
                    echo "<h1 class='p-2'>Displaying search result of '".$search."'</h1><hr>";
                    echo "<table class='table table-striped table-inverse table-responsive m-5'>";
                    echo "<thead class='thead-inverse'> <tr> <th>SN</th> <th>Index</th> <th>Data</th> </tr> </thead> <tbody>";

                    foreach ($file->rows() as $rowPos) {
                        $row++;
                        foreach ($rowPos as $data) {
                            echo "<tr>";
                            //echo "<td scope='row'>".$row."</td>";
                            if($needsAdvanceSearch){
                                if($isCaseInsensitive){
                                    if( similar_text(strtolower($search), strtolower($data), $perc) == strlen($search) )
                                        echo "<td scope='row'>".++$SN."</td><td>".$col.$row."</td><td>".$data."</td>";
                                }else{
                                    if( similar_text($search, $data, $perc) == strlen($search))
                                        echo "<td scope='row'>".++$SN."</td><td>".$col.$row."</td><td>".$data."</td>";
                                }
                            }else{
                                if($isCaseInsensitive){
                                    if( strtolower($search) == strtolower($data) )
                                        echo "<td scope='row'>".++$SN."</td><td>".$col.$row."</td><td>".$data."</td>";
                                }else{
                                    if($search == $data)
                                        echo "<td scope='row'>".++$SN."</td><td>".$col.$row."</td><td>".$data."</td>";
                                }
                            }
                            echo "</tr>";
                            $col++;
                        }$col = 'A';
                    }echo "</tbody> </table>";
                } else {
                    echo SimpleXLSX::parseError();
                }
            }
        ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
