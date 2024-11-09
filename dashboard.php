<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <!-- Link to Bootstrap CSS (from CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Welcome Message -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 id="welcomeMessage">Welcome to the System</h3>
            <button class="btn btn-danger" onclick="logout()">Logout</button>
        </div>

        <!-- Cards for Add Subject and Register Student -->
        <div class="row">
            <!-- Add a Subject Card -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Add a Subject</h5>
                        <p class="card-text">This section allows you to add a new subject in the system. Click the button below to proceed with the adding process.</p>
                        <button class="btn btn-primary w-100">Add Subject</button>
                    </div>
                </div>
            </div>

            <!-- Register a Student Card -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Register a Student</h5>
                        <p class="card-text">This section allows you to register a new student in the system. Click the button below to proceed with the registration process.</p>
                        <a href="register.php" class="btn btn-primary w-100">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (for interactive components like modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // Display the user's email in the welcome message
        function setWelcomeMessage(email) {
            document.getElementById('welcomeMessage').textContent = `Welcome to the System: ${email}`;
        }

        // Logout function
        function logout() {
            // Clear user session or token here if needed
            window.location.href = 'login.php'; // Redirect to login page
        }

        // Assume the email is passed through session or local storage
        document.addEventListener("DOMContentLoaded", function() {
            const email = localStorage.getItem('userEmail');
            if (email) {
                setWelcomeMessage(email);
            } else {
                // Redirect to login if email is not set (user is not logged in)
                window.location.href = 'login.php';
            }
        });
    </script>
</body>
</html>
