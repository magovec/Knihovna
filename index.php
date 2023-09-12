<?php

include("components/header.php");?>
<html>
<body>
<div class="container">
    <div class="text-center">
        <h1 class="mt-3">Hlavní stránka</h1>
        <?php if(isset($_SESSION["logged"]) && ($_SESSION["role"] > 0)) {?>
        <button type="button" class="mt-3 btn btn-success" data-bs-toggle="modal" data-bs-target="#pridatKnihu">Přidat</button>
        <?php }?>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis ipsum mauris. Maecenas a tristique neque. Proin auctor sapien et est facilisis, ac vehicula enim bibendum. Vestibulum id vestibulum purus. Nam interdum ex a nulla bibendum, in semper massa pulvinar. Sed cursus gravida mauris id luctus. Sed tristique turpis ut tempor eleifend. Fusce maximus leo vitae urna bibendum tempor. Mauris varius purus ut velit ultrices interdum. Curabitur bibendum, eros non feugiat dignissim, metus nulla euismod orci, ut cursus diam dolor vitae dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed et elementum mauris. Ut non purus vitae velit scelerisque lacinia eu vitae purus. Sed bibendum enim et malesuada consequat. Fusce interdum pharetra felis, in fringilla augue laoreet a. Mauris condimentum ultrices mauris, ac aliquet mi dapibus ut. Etiam ut ipsum in velit hendrerit vehicula. Aenean id tincidunt purus.</p>
        <hr>
    </div>
    <div class="modal fade" id="pridatKnihu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pridatKnihuNadpis" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="pridatKnihuNadpis">Přidat knihu</h1>
                </div>
                <div class="modal-body">
                    <form action="addbook.php" method="POST">
                        <div class="mb-3">
                            <label for="bookTitle" class="form-label">Název</label>
                            <input type="text" class="form-control" id="bookTitle" name="title" placeholder="Název..." required>
                        </div>
                        <div class="mb-3">
                            <label for="bookAuthor" class="form-label">Autor</label>
                            <input type="text" class="form-control" id="bookAuthor" name="author" placeholder="Autor..." required>
                        </div>
                        <div class="mb-3">
                            <label for="bookGenre" class="form-label">Žánr</label>
                            <input type="text" class="form-control" id="bookGenre" name="genre" placeholder="Žánr..." required>
                        </div>
                        <div class="mb-3">
                            <label for="bookPages" class="form-label">Počet stránek</label>
                            <input type="number" class="form-control" id="bookPages" name="pages" required>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Zavřít</button>
                    <button type="submit" class="btn btn-success">Přidat příspěvek</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    $result = $con->query("SELECT * FROM books ORDER BY id DESC");
    while($row = $result->fetch_assoc()){
        $id = $row["id"];
        $title = $row["title"];
        $author = $row["author"];
        $genre = $row["genre"];
        $pages = $row["pages"];

        echo"
                <div class='bg-grey shadow rounded text-light py-3 px-3 mb-3'>
                    <h3>$title</h3>
                    <p class=''>$author</p>
                    <p class=''>$genre </p>
                    <p class=''>$pages</p>";
    if (isset($_SESSION["logged"]) && ($_SESSION["role"] == 2))
        echo "                 
                <a class='btn btn-danger' href='deletebook.php?id=$id'>Smazat knihu</a>
                </div>
            ";
    }
    ?>



</body>
</html>
