document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault(); // Prevent the form from submitting the traditional way

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Clear any previous error messages
    document.querySelector('#email + span').innerText = '';
    document.querySelector('#password + span').innerText = '';

    try {
        const response = await fetch('login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
          body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}&signIn=1`
        });

        const data = await response.json();

        if (data.status === 'success') {
            // Redirect to the user dashboard if login is successful
            window.location.href = '../USER/index.php';
        } else {
            // Display the error message based on the field
            if (data.field === 'email') {
                document.querySelector('#email + span').innerText = data.message;
            } else if (data.field === 'password') {
                document.querySelector('#password + span').innerText = data.message;
            }
        }
    } catch (error) {
        console.error('Error:', error);
    }
});