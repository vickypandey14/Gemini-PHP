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

    fetch("response.php", {
        method: "post",
        body: JSON.stringify({
            text: text
        }),
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
    var index = 0;
    var typingEffect = setInterval(function() {
        if (index < responseText.length) {
            element.innerHTML += responseText.charAt(index);
            index++;
        } else {
            clearInterval(typingEffect);
        }
    }, 10);
}