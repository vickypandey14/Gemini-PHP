<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gemini API Integration in PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
  <style>
    body {
      font-family: 'Segoe UI', Roboto, Arial, sans-serif;
      background: linear-gradient(135deg, #141e30, #243b55);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: #fff;
      margin: 0;
    }

    h2 {
      font-weight: 700;
      font-size: 2.2rem;
      margin-bottom: 1rem;
      color: #fff;
      text-shadow: 0 0 12px rgba(0, 198, 255, 0.7);
    }

    .card-ui {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      padding: 2rem;
      width: 100%;
      max-width: 700px;
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.5);
      animation: fadeIn 1s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .form-control {
      border-radius: 12px;
      border: none;
      padding: 14px;
      font-size: 1rem;
      background-color: rgba(255, 255, 255, 0.1);
      color: #fff;
      transition: all 0.3s ease;
    }
    .form-control:focus {
      background-color: rgba(255, 255, 255, 0.15);
      box-shadow: 0 0 10px rgba(0, 198, 255, 0.6);
      color: #fff;
    }

    .btn-primary {
      border-radius: 12px;
      padding: 12px;
      font-weight: 600;
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      border: none;
      box-shadow: 0 6px 20px rgba(0, 198, 255, 0.5);
      transition: all 0.3s ease;
      width: 100%;
    }
    .btn-primary:hover {
      background: linear-gradient(135deg, #0072ff, #00c6ff);
      transform: scale(1.05);
      box-shadow: 0 8px 25px rgba(0, 198, 255, 0.7);
    }

    #response {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      padding: 1.2rem;
      min-height: 120px;
      margin-top: 1.5rem;
      font-size: 1.05rem;
      line-height: 1.6;
      color: #f1f1f1;
      white-space: pre-wrap;
      box-shadow: inset 0 0 12px rgba(255, 255, 255, 0.06);
      position: relative;
      overflow: hidden;
    }

    /* Glowing cursor for typing effect */
    #response::after {
      content: '';
      display: inline-block;
      width: 8px;
      height: 18px;
      background: #00c6ff;
      margin-left: 5px;
      border-radius: 2px;
      animation: blink 0.8s infinite;
      vertical-align: bottom;
    }

    .cursor {
        display: inline-block;
        width: 8px;
        height: 18px;
        background: #00ffcc;
        margin-left: 3px;
        animation: blink 0.5s infinite alternate;
        border-radius: 2px;
        box-shadow: 0 0 8px #00ffcc;
    }

    @keyframes blink {
        from { opacity: 1; }
        to { opacity: 0; }
    }

    footer {
      margin-top: 2rem;
      font-size: 0.9rem;
      color: #aaa;
    }
  </style>
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
  <script type="text/javascript">
    function generateResponse() {
      var text = document.getElementById("text").value;
      var response = document.getElementById("response");
      var button = document.getElementById("generateBtn");
      var spinner = button.querySelector(".spinner-border");

      if (text.trim() === "") {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Please enter some text before generating response!',
        });
        return;
      }

      button.disabled = true;
      spinner.classList.remove("d-none");
      response.innerHTML = ""; // clear previous

      fetch("response.php", {
        method: "post",
        body: JSON.stringify({ text: text }),
      })
        .then(res => res.text())
        .then(res => {
          spinner.classList.add("d-none");
          button.disabled = false;
          typeResponse(res, response);
        })
        .catch(error => {
          console.error('Error:', error);
          spinner.classList.add("d-none");
          button.disabled = false;
        });
    }

    function typeResponse(responseText, element) {
        let index = 0;
        element.innerHTML = "";
        
        const cursor = document.createElement("span");
        cursor.classList.add("cursor");
        element.appendChild(cursor);

        let typingEffect = setInterval(function () {
            if (index < responseText.length) {
                let chunk = responseText.substr(index, 5);
                cursor.insertAdjacentHTML("beforebegin", chunk);
                index += 5;
            } else {
                clearInterval(typingEffect);
                cursor.remove();
            }
        }, 5);
    }

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
