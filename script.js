var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 3000); // Change slide every 3 seconds
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}

const responses = {
    "maintenance": "Sure, I can help you with maintenance. What specific question do you have?",
    "battery": "For battery maintenance, it's recommended to...",
    "tire": "To maintain your tires, make sure to...",
    // Add more responses as needed
};

function askQuestion() {
    const userInput = document.getElementById("userInput").value;
    const chatBox = document.getElementById("chatBox");

    // Display user question
    chatBox.innerHTML += `<p>User: ${userInput}</p>`;

    // Check if there's a predefined response
    const response = responses[userInput.toLowerCase()];
    if (response) {
        chatBox.innerHTML += `<p>Chatbot: ${response}</p>`;
    } else {
        chatBox.innerHTML += `<p>Chatbot: I'm sorry, I don't understand that question.</p>`;
    }

    // Clear user input
    document.getElementById("userInput").value = "";
}