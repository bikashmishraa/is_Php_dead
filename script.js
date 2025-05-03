console.log("Hello, World!");
const form = document.querySelector(".form");
const button = document.querySelector("button");
form.addEventListener("submit", async function (event) {
    event.preventDefault(); // Prevent the form from submitting normally
    const message = document.getElementById("message").value;
    console.log("Message submitted:", message);
    setTimeout(() => { // Corrected the placement of setTimeout
        button.innerHTML = "Message submitted!"; // Disable the button after submission
    }, 500); // Delay before disabling the button
    // alert("Message submitted: " + message);
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST","https://bikashmishraa.github.io/is_Php_dead/index.php",true); // sending post request to index.php file so that it can be processed by the server
    xhr.onload = () =>{
        if(xhr.readyState == 4 && xhr.status == 200){
            let response =  xhr.response; // wait for the response from the server
            console.log("Server response:", response);
        }
    }
    let formData = new FormData(form); // create    a new FormData object from the form
    xhr.send(formData); // send the message to the server
    
    form.reset(); // Reset the form fields
    
});
