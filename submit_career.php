<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set headers for JSON response
header('Content-Type: application/json');

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize and validate input
    $full_name = isset($_POST['full_name']) ? htmlspecialchars(trim($_POST['full_name'])) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
    $position = isset($_POST['position']) ? htmlspecialchars(trim($_POST['position'])) : '';
    $linkedin = isset($_POST['linkedin']) ? htmlspecialchars(trim($_POST['linkedin'])) : '';
    $portfolio = isset($_POST['portfolio']) ? htmlspecialchars(trim($_POST['portfolio'])) : '';
    $experience = isset($_POST['experience']) ? htmlspecialchars(trim($_POST['experience'])) : '';
    $location = isset($_POST['location']) ? htmlspecialchars(trim($_POST['location'])) : '';
    $cover_letter = isset($_POST['cover_letter']) ? htmlspecialchars(trim($_POST['cover_letter'])) : '';
    
    // Validation
    $errors = [];
    
    if (empty($full_name)) {
        $errors[] = "Full name is required";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    
    if (empty($phone)) {
        $errors[] = "Phone number is required";
    }
    
    if (empty($position)) {
        $errors[] = "Position is required";
    }
    
    if (empty($experience)) {
        $errors[] = "Experience is required";
    }
    
    if (empty($location)) {
        $errors[] = "Location is required";
    }
    
    if (empty($cover_letter)) {
        $errors[] = "Cover letter is required";
    }
    
    // Handle file upload
    $resume_path = '';
    $resume_name = '';
    
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {
        $allowed_extensions = ['pdf', 'doc', 'docx'];
        $max_file_size = 5 * 1024 * 1024; // 5MB
        
        $file_name = $_FILES['resume']['name'];
        $file_size = $_FILES['resume']['size'];
        $file_tmp = $_FILES['resume']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Validate file extension
        if (!in_array($file_ext, $allowed_extensions)) {
            $errors[] = "Only PDF, DOC, and DOCX files are allowed";
        }
        
        // Validate file size
        if ($file_size > $max_file_size) {
            $errors[] = "Resume file size should not exceed 5MB";
        }
        
        // If no errors, upload file
        if (empty($errors)) {
            // Create uploads directory if it doesn't exist
            $upload_dir = 'career_uploads/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            // Generate unique filename
            $resume_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file_name);
            $resume_path = $upload_dir . $resume_name;
            
            // Move uploaded file
            if (!move_uploaded_file($file_tmp, $resume_path)) {
                $errors[] = "Failed to upload resume";
            }
        }
    } else {
        $errors[] = "Resume is required";
    }
    
    // If there are errors, return them
    if (!empty($errors)) {
        // Delete uploaded file if exists
        if (!empty($resume_path) && file_exists($resume_path)) {
            unlink($resume_path);
        }
        
        echo json_encode([
            'success' => false,
            'message' => 'Please fix the following errors:',
            'errors' => $errors
        ]);
        exit;
    }
    
    // --- CSV Saving Removed as per request ---
    // Only email notification is sent.
    
    // --- OPTION 2: Send Email ---
    $to = "riya@aviukta.com"; // Your HR email
    $subject = "New Career Application: $position - $full_name";
    
    $email_body = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { max-width: 700px; margin: 0 auto; padding: 20px; }
            .header { background: #4CAF50; color: white; padding: 20px; text-align: center; }
            .content { background: #f9f9f9; padding: 30px; }
            .field { margin-bottom: 20px; border-bottom: 1px solid #ddd; padding-bottom: 15px; }
            .label { font-weight: bold; color: #333; font-size: 14px; text-transform: uppercase; }
            .value { color: #666; margin-top: 8px; font-size: 15px; }
            .cover-letter { background: white; padding: 20px; border-left: 4px solid #4CAF50; margin-top: 20px; }
            .footer { text-align: center; padding: 20px; color: #999; font-size: 12px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>🎯 New Career Application Received</h2>
            </div>
            <div class='content'>
                <div class='field'>
                    <div class='label'>Applicant Name:</div>
                    <div class='value'>$full_name</div>
                </div>
                <div class='field'>
                    <div class='label'>Position Applied For:</div>
                    <div class='value'><strong>$position</strong></div>
                </div>
                <div class='field'>
                    <div class='label'>Email:</div>
                    <div class='value'><a href='mailto:$email'>$email</a></div>
                </div>
                <div class='field'>
                    <div class='label'>Phone:</div>
                    <div class='value'>$phone</div>
                </div>
                <div class='field'>
                    <div class='label'>Experience:</div>
                    <div class='value'>$experience</div>
                </div>
                <div class='field'>
                    <div class='label'>Location:</div>
                    <div class='value'>$location</div>
                </div>
                <div class='field'>
                    <div class='label'>LinkedIn Profile:</div>
                    <div class='value'>" . (!empty($linkedin) ? "<a href='$linkedin' target='_blank'>$linkedin</a>" : "Not provided") . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Portfolio/Website:</div>
                    <div class='value'>" . (!empty($portfolio) ? "<a href='$portfolio' target='_blank'>$portfolio</a>" : "Not provided") . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Resume:</div>
                    <div class='value'>File uploaded: <strong>$resume_name</strong></div>
                </div>
                <div class='cover-letter'>
                    <div class='label'>Cover Letter / Why Join Us:</div>
                    <div class='value' style='margin-top: 15px; line-height: 1.6;'>$cover_letter</div>
                </div>
                <div class='field' style='margin-top: 30px; border: none;'>
                    <div class='label'>Application Date:</div>
                    <div class='value'>" . date('d M Y, h:i A') . "</div>
                </div>
            </div>
            <div class='footer'>
                <p>This application was submitted via Aviukta Career Page</p>
                <p>Resume file is saved in: career_uploads/$resume_name</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: careers@aviukta.com" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    
    // Send email
    $email_sent = mail($to, $subject, $email_body, $headers);
    
    // Return success response
    echo json_encode([
        'success' => true,
        'message' => 'Thank you for applying! We have received your application and will review it shortly. We\'ll get back to you within 48 hours.',
        'email_sent' => $email_sent
    ]);
    
} else {
    // If not POST request
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
?>
