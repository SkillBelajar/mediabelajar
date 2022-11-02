<!DOCTYPE html>
<html>

<head>
    <title>Capture webcam image with php and jquery - ItSolutionStuff.com</title>
    <script src="jquery.min.js"></script>
    <script src="webcam.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <style type="text/css">
    #results {
        padding: 20px;
        border: 1px solid;
        background: #ccc;
    }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center">Silahkan Anda Foto Selfie Ya .... </h1>

        <form method="POST" action="storeImage.php?id=<?php echo $_GET["id"] ?>">
            <div class="row">
                <div class="col-md-6">
                    <div id="my_camera"></div>
                    <br />
                    <input type=button value="Ambil Foto" onClick="take_snapshot()">
                    <input type="hidden" name="image" class="image-tag">
                </div>
                <div class="col-md-6">
                    <div id="results">Gambar anda .</div>
                </div>
                <div class="col-md-12 text-center">
                    <br />
                    <button class="btn btn-success">Mulai Belajar </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }
    </script>

</body>

</html>