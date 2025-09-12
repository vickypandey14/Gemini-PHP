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