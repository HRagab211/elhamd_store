<?php
function website_head($pageTitle, $login = false){
    echo'<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/bio/css/bootstrap.css" rel="stylesheet" >
        <!-- TinyMCE -->
        <script src="https://cdn.tiny.cloud/1/tz7d3w2mctexn70khfvbcce8pxs8ldtr9rnxqg79dr3ctvxc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        ';
        echo "
        <script>
      tinymce.init({
        selector: '#mytextarea',
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
      });
    </script>";
        echo '<title>'.$pageTitle.'</title>
    </head>
    <body>
                        ';
                            if($login){
                            } else{
                                echo '<a class="nav-link" href="http://localhost/elhamd/Admin/login.php">login</a>';
                            }
                            echo'
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </nav>
        ';
}