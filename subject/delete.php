<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
    
    <!-- Link to Bootstrap CSS (from CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="registration.php">Register Student</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delete Student</li>
            </ol>
        </nav>

        <!-- Delete Student Card -->
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h3 class="card-title">Delete a Student</h3>

                <!-- Display the student details -->
                <div id="studentDetails">
                    <p><strong>Student ID:</strong> <span id="studentId"></span></p>
                    <p><strong>First Name:</strong> <span id="firstName"></span></p>
                    <p><strong>Last Name:</strong> <span id="lastName"></span></p>
                </div>

                <!-- Confirm Deletion Button -->
                <button class="btn btn-danger w-100 mt-4" onclick="deleteStudent()">Delete Student</button>
                <button class="btn btn-secondary w-100 mt-2" onclick="goBack()">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (for interactive components like modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // Array to store the student data (this should ideally be from your backend or storage)
        let studentList = [
            { studentId: '001', firstName: 'John', lastName: 'Doe' },
            { studentId: '002', firstName: 'Jane', lastName: 'Smith' },
            { studentId: '003', firstName: 'Mark', lastName: 'Johnson' }
        ];

        // Function to get the student ID from the URL or query parameters
        function getStudentIdFromUrl() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('studentId');
        }

        // Load student details based on the student ID from the URL
        function loadStudentDetails() {
            const studentId = getStudentIdFromUrl();
            if (!studentId) {
                alert('Student ID is missing.');
                return;
            }

            const student = studentList.find(student => student.studentId === studentId);
            if (student) {
                document.getElementById('studentId').textContent = student.studentId;
                document.getElementById('firstName').textContent = student.firstName;
                document.getElementById('lastName').textContent = student.lastName;
            } else {
                alert('Student not found.');
            }
        }

        // Function to delete the student
        function deleteStudent() {
            const studentId = getStudentIdFromUrl();
            if (!studentId) {
                alert('Student ID is missing.');
                return;
            }

            // Confirm deletion
            const isConfirmed = confirm('Are you sure you want to delete this student?');
            if (isConfirmed) {
                studentList = studentList.filter(student => student.studentId !== studentId);
                alert('Student deleted successfully.');
                window.location.href = 'register.php'; // Redirect to registration page after deletion
            }
        }

        // Function to go back to the previous page
        function goBack() {
            window.location.href = 'register.php'; // Go back to registration page
        }

        // Load student details on page load
        window.onload = loadStudentDetails;
    </script>
</body>
</html>
