<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    
    <!-- Link to Bootstrap CSS (from CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <!-- Wrapper to center alert and card together -->
        <div class="d-flex flex-column align-items-center" style="width: 300px;">
            <!-- Dismissible error message alert centered above the login card -->
            <div id="error-message" class="alert alert-danger alert-dismissible d-none w-100" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>System Errors:</strong>
                <ul id="error-list" class="mb-0">
                    <!-- Error list will be populated here dynamically -->
                </ul>
            </div>

            <!-- Login Form Card -->
            <div class="card shadow-sm border-0 w-100" style="padding: 20px;">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Login</h5>
                    <form id="loginForm" onsubmit="return handleLogin(event)">
                        <!-- Email input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>

                        <!-- Password input -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (necessary for dismissing alerts) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        function handleLogin(event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('error-message');
            const errorList = document.getElementById('error-list');

            const correctEmail = 'user@example.com'; // Replace with actual correct email
            const correctPassword = 'pass'; // Replace with actual correct password

            let errors = [];

            // Check email and password
            if (email !== correctEmail) {
                errors.push('Email is incorrect.');
            }

            if (password !== correctPassword) {
                errors.push('Password is incorrect.');
            }

            if (errors.length > 0) {
                // Show the error message
                errorMessage.classList.remove('d-none');
                errorList.innerHTML = ''; // Clear previous errors
                errors.forEach(function(error) {
                    const li = document.createElement('li');
                    li.textContent = error;
                    errorList.appendChild(li);
                });
            } else {
                // Hide error message and redirect
                errorMessage.classList.add('d-none');
                localStorage.setItem('userEmail', email); // Store email
                window.location.href = 'dashboard.php'; // Redirect to dashboard
            }
        }
    </script>
</body>
</html>
