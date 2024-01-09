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

function askQuestion() {
    var userQuestion = document.getElementById('user-input').value;
    var chatHistory = document.getElementById('chat-history');

    // Display user question in the chat history
    chatHistory.innerHTML += '<strong>User:</strong> ' + userQuestion + '<br>';

    // Check for predefined questions and provide responses
    switch (userQuestion.toLowerCase()) {
        case 'How can I save battery?':
            chatHistory.innerHTML += '<strong>Chatbot:</strong> To save you battery: Avoid rapid acceleration and heavy breaking, park in shaded areas to prevent ur battery from overhaeating !<br>';
            break;
        case 'how does this work?':
            chatHistory.innerHTML += '<strong>Chatbot:</strong> You can ask questions, and I will provide predefined responses.<br>';
            break;
        // Add more predefined questions and responses as needed
        default:
            chatHistory.innerHTML += '<strong>Chatbot:</strong> I\'m sorry, I don\'t understand that question.<br>';
    }

    // Clear the user input
    document.getElementById('user-input').value = '';
}
