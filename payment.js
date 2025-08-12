document.getElementById("paymentForm").addEventListener("submit", function(e) {
    e.preventDefault();

    // Fake validation
    const cardNumber = document.getElementById("cardNumber").value;
    const expiry = document.getElementById("expiry").value;
    const cvv = document.getElementById("cvv").value;

    if (cardNumber.length !== 16 || isNaN(cardNumber)) {
        alert("Please enter a valid 16-digit card number.");
        return;
    }
    if (!/^\d{2}\/\d{2}$/.test(expiry)) {
        alert("Please enter expiry in MM/YY format.");
        return;
    }
    if (cvv.length !== 3 || isNaN(cvv)) {
        alert("Please enter a valid 3-digit CVV.");
        return;
    }

    // Show success message
    document.querySelector(".success-message").style.display = "block";

    // Redirect after 2 seconds
    setTimeout(() => {
        window.location.href = "index.html"; // Change to your homepage filename
    }, 2000);
});
