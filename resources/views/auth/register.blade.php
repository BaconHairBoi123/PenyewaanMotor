<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up & Verification</title>
    @vite(['resources/css/login.css', 'resources/css/register.css'])
    <style>
        /* Custom Styles for Split Layout */
        body {
            background-image: url('{{ asset("assets/images/background/login-bg.jpg") }}'); /* Ensure BG exists */
            background-size: cover;
            background-position: center;
            font-family: 'Outfit', sans-serif;
            margin: 0;
            min-height: 100vh; /* Allow growing */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0; /* Add spacing for scrolling */
            box-sizing: border-box;
        }
        .container-split {
            display: flex;
            width: 90%;
            max-width: 1200px;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 20px;
            /* box-shadow: 0 10px 30px rgba(0,0,0,0.5); removed fixed height constraints */
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative; /* Ensure z-index works if needed */
        }
        .left-panel, .right-panel {
            padding: 40px;
            flex: 1;
            /* Removed overflow-y: auto to let it grow */
        }
        .left-panel {
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }
        .right-panel {
            display: flex;
            flex-direction: column;
        }
        h2 {
            color: #fff;
            margin-bottom: 20px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group input, .input-group textarea {
            width: 100%;
            padding: 12px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: #fff;
            font-size: 14px;
        }
        .input-group input:focus {
            outline: none;
            border-color: #FFB51D;
        }
        .btn-toggle-group {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }
        .btn-toggle {
            flex: 1;
            padding: 12px;
            border: 1px solid #FFB51D;
            background: transparent;
            color: #FFB51D;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            text-align: center;
        }
        .btn-toggle.active, .btn-toggle:hover {
            background: #FFB51D;
            color: #000;
        }
        .verification-content {
            flex-grow: 1;
        }
        .file-upload-box {
            border: 2px dashed rgba(255, 255, 255, 0.3);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 15px;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: border-color 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 80px;
        }
        .file-upload-box:hover {
            border-color: #FFB51D;
            color: #fff;
        }
        .file-upload-box input {
            display: none;
        }
        .submit-btn {
            width: 100%;
            padding: 15px;
            background: #FFB51D;
            color: #000;
            border: none;
            border-radius: 8px;
            font-weight: 800;
            text-transform: uppercase;
            cursor: pointer;
            margin-top: 20px;
            transition: transform 0.2s;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
        }
        .disabled-section {
            opacity: 0.5;
            pointer-events: none;
        }
        .course-popup {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #FFB51D;
            color: #ccc;
            display: none;
        }
        .preview-img {
            max-width: 100%;
            max-height: 150px;
            border-radius: 5px;
            display: none;
            object-fit: contain;
        }
    </style>
</head>
<body>

<form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data" class="container-split">
    @csrf

    <!-- LEFT PANEL: REGISTRATION DATA -->
    <div class="left-panel">
        <h2>Register Data</h2>
        
        @if ($errors->any())
            <div style="background: rgba(255,0,0,0.2); color: #ff6b6b; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="input-group">
            <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
        </div>
        <div class="input-group">
            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
        </div>
        <div class="input-group">
            <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
        </div>
        <div class="input-group">
            <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
        </div>
        <div class="input-group">
            <input type="text" name="address" placeholder="Address" value="{{ old('address') }}" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="input-group">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>
        
        <p style="color: #ccc; font-size: 13px; margin-top: 10px;">
            Already have an account? <a href="{{ route('login') }}" style="color: #FFB51D; text-decoration: none;">Login here</a>
        </p>
    </div>

    <!-- RIGHT PANEL: VERIFICATION -->
    <div class="right-panel">
        <h2>License Verification</h2>
        
        <!-- Toggle Buttons -->
        <div class="btn-toggle-group">
            <div class="btn-toggle active" id="btn-verify" onclick="setVerificationMode('verify')">Verify SIM</div>
            <div class="btn-toggle" id="btn-no-sim" onclick="setVerificationMode('course')">I don't have SIM</div>
        </div>

        <input type="hidden" name="verification_type" id="verification_type" value="sim">

        <!-- Verify SIM Content -->
        <div id="verify-content" class="verification-content">
            <p style="color: #aaa; margin-bottom: 15px; font-size: 14px;">Please upload your documents for verification.</p>
            
            <!-- Face Photo -->
            <label class="file-upload-box">
                <span>📸 Upload Face Photo</span>
                <input type="file" name="face_photo" id="face_photo" accept="image/*" onchange="previewImage(this, 'preview-face')">
                <img id="preview-face" class="preview-img">
            </label>

            <!-- SIM Photo -->
            <label class="file-upload-box">
                <span>🆔 Upload International SIM</span>
                <input type="file" name="license_photo" id="license_photo" accept="image/*" onchange="previewImage(this, 'preview-license')">
                <img id="preview-license" class="preview-img">
            </label>
        </div>

        <!-- Course Content (Hidden by default) -->
        <div id="course-content" class="course-popup">
            <h4 style="color: #FFB51D; margin: 0 0 10px 0;">Riding Course Required</h4>
            <p style="font-size: 14px; line-height: 1.5;">
                Since you don't have an International SIM, you are required to take our safety riding course before renting.<br><br>
                Please proceed with registration. Our team will contact you with course schedules and details.
            </p>
        </div>

        <button type="submit" class="submit-btn" id="submit-btn">Complete Registration</button>
    </div>

</form>

<script>
    function setVerificationMode(mode) {
        // Update hidden input
        document.getElementById('verification_type').value = mode === 'verify' ? 'sim' : 'course';

        // Update UI Tabs
        document.getElementById('btn-verify').classList.toggle('active', mode === 'verify');
        document.getElementById('btn-no-sim').classList.toggle('active', mode === 'course');

        // Toggle Content
        const verifyContent = document.getElementById('verify-content');
        const courseContent = document.getElementById('course-content');

        if (mode === 'verify') {
            verifyContent.style.display = 'block';
            courseContent.style.display = 'none';
            
            // Enable inputs
            document.getElementById('face_photo').disabled = false;
            document.getElementById('license_photo').disabled = false;
        } else {
            verifyContent.style.display = 'none';
            courseContent.style.display = 'block';

            // Disable inputs so they are not validated/sent
            document.getElementById('face_photo').disabled = true;
            document.getElementById('license_photo').disabled = true;
        }
    }

    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = document.getElementById(previewId);
                preview.src = e.target.result;
                preview.style.display = 'block';
                // Hide text span
                input.parentElement.querySelector('span').style.display = 'none';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</body>
</html>