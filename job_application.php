<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$showToast = false; // Variable to control toast visibility

if (isset($_POST['send'])) {
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $experience = $_POST['experience'] ?? '';
    $position = $_POST['position'] ?? '';

    $msg = '<html><body>';
    $msg .= '<h2>Job Application Form Details:</h2>';
    $msg .= "<p><strong>Full Name:</strong> $fullname</p>";
    $msg .= "<p><strong>Email:</strong> $email</p>";
    $msg .= "<p><strong>Contact:</strong> $contact</p>";
    $msg .= "<p><strong>Experience:</strong> $experience</p>";
    $msg .= "<p><strong>Position:</strong> $position</p>";
    $msg .= '</body></html>';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'apexitsolutionpvtltd@gmail.com';
        $mail->Password = 'souv ngst qqjz zndy'; // Consider using an app password for security
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('apexitsolutionpvtltd@gmail.com', 'Apex IT Solution');
        $mail->addAddress('inquiry@apexitsolution.in', 'HR Team');
        $mail->Subject = 'New Job Application Received';
        $mail->isHTML(true);
        $mail->Body = $msg;

        // Handle file uploads
        if (!empty($_FILES['file']['name'][0])) {
            foreach ($_FILES['file']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['file']['error'][$key] === UPLOAD_ERR_OK) {
                    $mail->addAttachment($tmp_name, $_FILES['file']['name'][$key]);
                }
            }
        }

        if ($mail->send()) {
            $showToast = true; // Enable toast on success
        } else {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Apex IT Solution: Project-Based IT Training &amp; Placement</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap">
        <!-- Custom CSS file-->
        <link rel="stylesheet" href="./style.css">
        <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon.png">
        <!-- GeistSans_3a0388 font-->
        <link rel="stylesheet" href="https://your-font-cdn.com/GeistSans_3a0388.css">
    </head>

<body>
    <div class="scrolling-text-container">
        <div class="scrolling-text">
            Upcoming Batches: Data Science, Data Analyst, Java Fullstack, Aws DevOps, Frontend (React JS), Data Science,
            Data Analyst, Java Fullstack, Business Analyst, Data Analyst, Data Science, Aws DevOps, Data Analyst, Data
            Science, Aws DevOps — Upcoming Batches: Data Science, Data Analyst, Java Fullstack, Aws DevOps, Frontend
            (React JS), Data Science, Data Analyst, Java Fullstack, Business Analyst, Data Analyst, Data Science, Aws
            DevOps, Data Analyst, Data Science, Aws DevOps
        </div>
    </div>
    <!-- Top Nav section -->
    <header>
        <div id="topHeader">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <!-- Logo -->
                        <a class="navbar-brand d-flex align-items-center" href="#">
                            <img src="./images/logo.jpeg" alt="Logo" width="150" height="40" class="img-fluid">
                        </a>
                        <!-- Custom Hamburger menu button -->
                        <button id="navbarToggler" class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#topNav" aria-controls="topNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                        <!-- Collapsible contact links -->
                        <div class="collapse navbar-collapse justify-content-end" id="topNav">
                            <div class="center-mobile-nav navbar-nav d-flex flex-lg-row flex-column gap-1 gap-lg-3">
                                <a href="mailto:info@apexitsolution.in" class="nav-link no-underline">
                                    <i class="fa-solid fa-envelope"></i> info@apexitsolution.in
                                </a>

                                <a href="mailto:hr@apexitsolution.in" class="nav-link no-underline">
                                    <i class="fa-solid fa-envelope"></i> hr@apexitsolution.in
                                </a>
                                <a href="tel:+9189568 89634" class="nav-link no-underline">
                                    <i class="fa-solid fa-phone-volume"></i> +91 89568 89634
                                </a>
                                <a href="tel:+918010410293" class="nav-link no-underline">
                                    <i class="fa-solid fa-phone-volume"></i> +91 8010410293
                                </a>
                                <a href="#" class="nav-link d-inline-flex  align-items-start  no-underline"
                                    id="bookSeatLink">
                                    <i class="fa-solid fa-phone"></i> Book a Seat
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="bookSeatModal" tabindex="-1" aria-labelledby="bookSeatModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!-- Changed modal-lg to modal-xl for more width -->
                <div class="modal-content" style="min-height: 90vh;">
                    <!-- Increased height -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookSeatModalLabel">Book a Seat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Left side image -->
                            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center">
                                <img src="./images/bookseat.png" alt="Seat Booking Image" class="img-fluid rounded-5">
                            </div>

                            <!-- Vertical Line -->
                            <div class="col-lg-1 d-none d-lg-flex align-items-center justify-content-center">
                                <div class="border-end border-2 h-100"></div>
                            </div>

                            <!-- Right side form -->
                            <div class="col-lg-5 col-12">
                                <form action="./job_application.php" method="post">
                                    <div class="mb-3">
                                        <label for="fullName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" name="fullName"
                                            placeholder="Enter your Full Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mobileNumber" class="form-label">Mobile Number</label>
                                        <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber"
                                            pattern="(\+91)?[0-9]{10}" placeholder="Enter your mobile number" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="emailId" class="form-label">Email ID</label>
                                        <input type="email" class="form-control" id="emailId" name="emailId"
                                            placeholder="Enter your email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="course" class="form-label">Course</label>
                                        <select class="form-select" id="course" name="course" required>
                                            <option value="" selected disabled>Select Course</option>
                                            <option value="Data Science">Data Science</option>
                                            <option value="Power BI">Power BI</option>
                                            <option value="React.js">React.js</option>
                                            <option value="Python Development">Python Development</option>
                                            <option value="Microsoft Azure">Microsoft Azure</option>
                                            <option value="Business Analyst">Business Analyst</option>
                                            <option value="Data Analyst">Data Analyst</option>
                                            <option value="AWS with DevOps">AWS with DevOps</option>
                                            <option value="Java Development">Java Development</option>
                                            <option value="Full Stack Web Development">Full Stack Web Development
                                            </option>
                                            <option value="Oracle SQL and PLSQL">Oracle SQL and PLSQL</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mode" class="form-label">Mode</label>
                                        <select class="form-select" id="mode" name="mode" required>
                                            <option value="" selected disabled>Select Mode</option>
                                            <option value="Online">Online</option>
                                            <option value="Offline">Offline</option>
                                            <option value="Hybrid">Hybrid</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn w-100"
                                        style="background-color: #A051F5;">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <!-- Bottom Nav section -->
    <header>
        <div id="bottomHeader" class="shadow-sm">
            <div class="container">
                <nav class="navbar navbar-expand-lg ">
                    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Collapsible navigation links -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav gap-3 ">
                            <li class="nav-item">
                                <a class="nav-link" href="./index.html"><i class="fa-solid fa-house"></i> Home</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button">
                                    <i class="fa-solid fa-graduation-cap"></i> Our Courses
                                </a>
                                <ul class="dropdown-menu mt-3 p-3" style="background-color: #D6B3FF; min-width: 600px;"
                                    aria-labelledby="navbarDropdown">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <li><a class="dropdown-item" href="./courses/data-science.html">Data
                                                    Science</a>
                                            </li>
                                            <li><a class="dropdown-item" href="./courses/power-bi.html">Power BI</a>
                                            </li>
                                            <li><a class="dropdown-item" href="./courses/react-js.html">React.js</a>
                                            </li>
                                            <li><a class="dropdown-item" href="./courses/python-development.html">Python
                                                    Development</a></li>
                                            <li><a class="dropdown-item" href="./courses/microsoft-azure.html">Microsoft
                                                    Azure</a></li>
                                            <li><a class="dropdown-item" href="./courses/business-analyst.html">Business
                                                    Analyst</a></li>
                                        </div>
                                        <div class="col-lg-7">
                                            <li><a class="dropdown-item" href="./courses/data-analyst.html">Data
                                                    Analyst</a>
                                            </li>
                                            <li><a class="dropdown-item" href="./courses/aws-devops.html">AWS with
                                                    DevOps</a>
                                            </li>
                                            <li><a class="dropdown-item" href="./courses/java-development.html">Java
                                                    Development</a></li>
                                            <li><a class="dropdown-item"
                                                    href="./courses/full-stack-web-development.html">Full
                                                    Stack Web Development</a></li>
                                            <li><a class="dropdown-item"
                                                    href="./courses/oracle-sql-and-plsql.html">Oracle SQL
                                                    and PLSQL</a></li>
                                            <!-- <li><a class="dropdown-item" href="#">test</a></li> -->
                                        </div>
                                    </div>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle " href="#" id="navbarDropdown" role="button">
                                    <i class="fa-solid fa-calendar-days"></i> Batches
                                </a>
                                <ul class="dropdown-menu mt-3" style="background-color: #D6B3FF;"
                                    aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="./batches/all-batches.html">All-Batches</a></li>
                                    <li><a class="dropdown-item" href="./batches/online-batches.html">Online-Batches</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="./batches/offline-batches.html">Offline-Batches</a></li>
                                    <li><a class="dropdown-item" href="./batches/hybrid-batches.html">Hybrid-Batches</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./our-placement.html">
                                    <i class="fa-solid fa-award"></i> Our Placements
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./about-us.html"><i class="fa-solid fa-info-circle"></i>
                                    About
                                    Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./contact-us.html"><i class="fa-solid fa-envelope"></i>
                                    Contact Us</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="./technology-program.html"><i
                                        class="fa-solid fa-chalkboard-teacher"></i> Corporate
                                    Training</a>
                            </li> -->


                            <li class="nav-item dropdown">
                                <a class="" href="#"><i class="fa-solid fa-chalkboard-teacher"></i>
                                    Corporate
                                    Training</a>
                                <ul class="dropdown-menu mt-3" style="background-color: #D6B3FF;"
                                    aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="./technology-program.html">Technology Training
                                            Program</a></li>
                                    <li><a class="dropdown-item" href="./management-program.html">Management
                                            Development
                                            Program</a></li>
                                    <li><a class="dropdown-item" href="./enterprise-services.html">Enterprise
                                            Services</a></li>
                                    <li><a class="dropdown-item" href="./microsoft-365.html">Microsoft Office 365</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#"><i class="fa-solid fa-briefcase"></i>
                                    Career</a>
                                <ul class="dropdown-menu mt-3" style="background-color: #D6B3FF;"
                                    aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="./career/technical.html">Technical</a></li>
                                    <li><a class="dropdown-item" href="./career/non-technical.html">Non Technical</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="form-container"
            style="max-width: 500px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <h3 class="text-center" style="color: #6f42c1;">Job Application Form</h3>
            <form action="./job_application.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" style="color: #6f42c1; font-weight: bold;">Full Name</label>
                    <input type="text" name="fullname" id="fullName" class="form-control" placeholder="Enter Full Name"
                        required style="border-color: #6f42c1;">
                </div>

                <div class="mb-3">
                    <label class="form-label" style="color: #6f42c1; font-weight: bold;">Phone Number</label>
                    <input type="tel" name="contact" pattern="(\+91)?[0-9]{10}" class="form-control"
                        placeholder="Enter Phone Number" required style="border-color: #6f42c1;">
                </div>

                <div class="mb-3">
                    <label class="form-label" style="color: #6f42c1; font-weight: bold;">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required
                        style="border-color: #6f42c1;">
                </div>

                <div class="mb-3">
                    <label class="form-label" style="color: #6f42c1; font-weight: bold;">Work Experience</label>
                    <select name="experience" class="form-select" required style="border-color: #6f42c1;">
                        <option selected disabled>Please select</option>
                        <option value="Fresher">Fresher</option>
                        <option value="1-2 years">1-2 years</option>
                        <option value="3-5 years">3-5 years</option>
                        <option value="More than 5 years">More than 5 years</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" style="color: #6f42c1; font-weight: bold;">Select Role</label>
                    <select name="position" class="form-select" required style="border-color: #6f42c1;">
                        <option selected disabled>Please select</option>
                        <optgroup label="Technical Roles">
                            <option value="Data Science Trainer">Data Science Trainer</option>
                            <option value="AWS Trainer">AWS Trainer</option>
                            <option value="Java Trainer">Java Trainer</option>
                            <option value="React Js Trainer">React Js Trainer</option>
                            <option value="Power BI Trainer">Power BI Trainer</option>
                            <option value="Data Analytics Trainer">Data Analytics Trainer</option>
                            <option value="DevOps Trainer">DevOps Trainer</option>
                            <option value="Java Fullstack Trainer">Java Fullstack Trainer</option>
                            <option value="Business Analyst Trainer">Business Analyst Trainer</option>
                            <option value="Data Science with AI Trainer">Data Science with AI Trainer</option>
                        </optgroup>
                        <optgroup label="Non-Technical Roles">
                            <option value="Admission Counselor">Admission Counselor</option>
                            <option value="Admin Executive">Admin Executive</option>
                            <option value="Branch Manager">Branch Manager</option>
                            <option value="HR Executive">HR Executive</option>
                            <option value="HR and Placement Executive">HR and Placement Executive</option>
                            <option value="Business Development Associate">Business Development Associate</option>
                            <option value="Front Desk Executive">Front Desk Executive</option>
                            <option value="Team Lead">Team Lead</option>
                            <option value="Team Manager">Team Manager</option>
                            <option value="Training and Placement Officer">Training and Placement Officer</option>
                        </optgroup>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Your CV here</label>
                    <input type="file" name="file[]" multiple class="form-control" accept=".pdf, .doc, .docx" required>
                </div>

                <div class="text-center">
                    <button type="submit" name="send" class="btn"
                        style="background-color: #6f42c1; color: white; font-weight: bold; width: 100%;">Submit
                        Application</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap Toast -->
    <!-- Bootstrap Toast -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
        <div id="successToast" class="toast bg-success text-white" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header text-white bg-success">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body">
                You have successfully applied for the job! Our team will contact you as soon as possible.
            </div>
        </div>
    </div>


    <!-- Footer section -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 ">
                    <h5>About Us</h5>
                    <p>Apex IT Solution offers dynamic courses that combine theory with hands-on training, preparing you
                        for a successful IT career. Learn from expert instructors and gain industry-ready skills in a
                        cutting-edge environment.</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Our Courses</h5>
                    <ul class="list-unstyled">
                        <li><a href="./courses/data-science.html">Data Science</a></li>
                        <li><a href="./courses/data-analyst.html">Data Analyst</a></li>
                        <li><a href="./courses/power-bi.html">Power BI</a></li>
                        <li><a href="./courses/aws-devops.html">AWS with DevOps</a></li>
                        <li><a href="./courses/react-js.html">React JS</a></li>
                        <li><a href="./courses/java-development.html">Java Development</a></li>
                        <li><a href="./courses/python-development.html">Python Development</a></li>
                        <li><a href="./courses/full-stack-web-development.html">Full Stack Web Development</a></li>
                        <li><a href="./courses/microsoft-azure.html">Microsoft Azure</a></li>
                        <li><a href="./courses/oracle-sql-and-plsql.html">Oracle SQL and PLSQL</a></li>
                        <li><a href="./courses/business-analyst.html">Business Analyst</a></li>
                    </ul>

                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="./about-us.html">About Us</a></li>
                        <li><a href="./career/technical.html">Technical Job Openings</a></li>
                        <li><a href="./career/non-technical.html">NON-Technical Job Openings</a></li>
                        <li><a href="./batches/all-batches.html">All Batches</a></li>
                        <li><a href="./batches/online-batches.html">Online Batches</a></li>
                        <li><a href="./batches/offline-batches.html">Offline Batches</a></li>
                        <li><a href="./batches/hybrid-batches.html">Hybrid Batches</a></li>
                        <li><a href="./our-placement.html">Our Placements</a></li>
                        <li><a href="./contact-us.html">Contact Us</a></li>
                        <li><a href="./enterprise-services.html">Enterprise Services</a></li>
                        <li><a href="./management-program.html">Management Program</a></li>
                        <li><a href="./microsoft-365.html">Microsoft-365</a></li>
                        <li><a href="./technology-program.html">Technology Program</a></li>
                    </ul>

                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Contact Details</h5>
                    <p><i class="fas fa-map-marker-alt" style="color: #A051F5;"></i> Office No. B 622, 6th Floor
                        Suratwala Mark Plazzo, Hinjawadi,
                        Pimpri-Chinchwad, Pune Maharashtra 411057.</p>
                    <p>
                        <i class="fas fa-envelope" style="color: #A051F5;"></i>
                        <a href="mailto:info@apexitsolution.in" style="text-decoration: none; color: inherit;">
                            info@apexitsolution.in
                        </a>
                    </p>
                    <p>
                        <i class="fas fa-envelope" style="color: #A051F5;"></i>
                        <a href="mailto:hr@apexitsolution.in" style="text-decoration: none; color: inherit;">
                            hr@apexitsolution.in
                        </a>
                    </p>
                    <p>
                        <i class="fas fa-phone" style="color: #A051F5;"></i>
                        <a href="tel:+918956889634" style="text-decoration: none; color: inherit;">+91 89568 89634</a>,
                        <a href="tel:+918010410293" style="text-decoration: none; color: inherit;">8010410293</a>
                    </p>

                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="policy-links mt-3">
                        <a href="#">Refund Policy</a> | <a href="#">Privacy Policy</a>
                    </div>
                    <p class="mt-3">2025 &copy; All Rights Reserved | Designed and Developed by <a
                            href="../index.html">Apex IT
                            Solution</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS (Popper included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- top nav toggle -->
    <script>
    const toggler = document.getElementById('navbarToggler');
    const icon = toggler.querySelector('i');

    // Handle icon change on toggle
    toggler.addEventListener('click', () => {
        const isExpanded = toggler.getAttribute('aria-expanded') === 'true';

        if (isExpanded) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        } else {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    });
    </script>

    <!-- courses -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownToggle = document.getElementById("navbarDropdown");
        const dropdownMenu = dropdownToggle.nextElementSibling;

        dropdownToggle.addEventListener("click", function(e) {
            e.preventDefault();
            dropdownMenu.classList.toggle("show");
        });

        // Close dropdown on clicking outside
        document.addEventListener("click", function(e) {
            if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove("show");
            }
        });
    });
    </script>

    <!-- // Show the modal 2 seconds after click on book a seat -->
    <script>
    document.getElementById('bookSeatLink').addEventListener('click', function(event) {
        event.preventDefault();
        var bookSeatModal = new bootstrap.Modal(document.getElementById('bookSeatModal'));
        bookSeatModal.show();
    });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php if ($showToast): ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var successToast = new bootstrap.Toast(document.getElementById("successToast"));
        successToast.show();
    });
    </script>
    <?php endif; ?>

</body>

</html>