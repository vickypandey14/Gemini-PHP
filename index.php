<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gemini API Integration in PHP</title>
  <meta name="author" content="Vivek Chandra Pandey" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

  <div class="card-ui">
    <div class="text-center mb-4">
      <h2><i class="bi bi-google"></i> Gemini API Integration</h2>
    </div>

    <input type="text" placeholder="Enter your prompt here..." class="form-control mb-3" id="text" required>
    
    <button id="generateBtn" onclick="generateResponse();" class="btn btn-primary">
      <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
      Generate Response
    </button>
    
    <div id="response"></div>
  </div>

  <footer>
    <p>&copy; <script>document.write(new Date().getFullYear())</script> Vivek Chandra Pandey. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="public/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
