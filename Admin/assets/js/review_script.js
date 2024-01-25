function submitFeedback() {
    var formData = new FormData(document.getElementById('submit-feedback-form'));

    // Make an AJAX request to handle form submission
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit_feedback.php', true);
    xhr.onload = function () {
        // Handle the response (e.g., display a success message)
        console.log(xhr.responseText);
    };
    xhr.send(formData);
}