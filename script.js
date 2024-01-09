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

function selectOption(option) {
    var chatHistory = document.getElementById('chat-history');

    // Display user-selected option in the chat history
    chatHistory.innerHTML += '<strong>User:</strong> Selected ' + option + '<br>';

    // Provide a response based on the selected option
    switch (option.toLowerCase()) {
        case 'option 1':
            chatHistory.innerHTML += '<strong>Chatbot:</strong> Smooth Driving, Regenerative Braking, Maintain a Moderate Speed <br>';
            break;
        case 'option 2':
            chatHistory.innerHTML += '<strong>Chatbot:</strong> Option 2 is a good pick!<br>';
            break;
        case 'option 3':
            chatHistory.innerHTML += '<strong>Chatbot:</strong> Option 3 is fantastic!<br>';
            break;
        // Add more options and responses as needed
        default:
            chatHistory.innerHTML += '<strong>Chatbot:</strong> I\'m sorry, I don\'t understand that option.<br>';
    }
}

