<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemini API Integration in PHP</title>
    <!-- <link rel="stylesheet" href="public/css/mdb.min.css"/> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <style>
        body{
            font-family: arial;
        }
    </style>
</head>
<body class="bg-dark text-light">

    <div class="container mt-4">
        <div class="col-sm-12 mx-auto">
            <div class="row">
                <h2 class="text-center"><i class="bi bi-google"></i>emini API Integration</h2>
            </div>

            <div class="row border p-4 m-3 rounded-2 shadow">
                <div class="col-sm-10 mx-auto mt-4">
                    <input type="text" name="" placeholder="Please Enter Your Prompt Here..." class="form-control border rounded" id="text" required>
                </div>
                <div class="col-sm-10 mx-auto mt-3">
                    <button id="generateBtn" onclick="generateResponse();" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Generate Response
                    </button>
                </div>
                <div class="col-sm-10 mx-auto mt-4">
                    <div id="response"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="container mt-5">
        <footer class="py-5">

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>&copy; <script>document.write(new Date().getFullYear())</script> ByteWebster. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                
            </ul>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="public/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="public/js/mdb.umd.min.js"></script> -->
</body>
</html>
