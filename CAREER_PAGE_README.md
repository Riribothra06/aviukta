# 💼 Career Page - Aviukta Website

## ✅ Kya Banaya Gaya Hai:

### 🎯 **Career Page Features:**

1. **Beautiful Design** - Website ki theme ke saath perfectly match karta hai
2. **Job Listings** - 4 open positions display hote hain
3. **Application Form** - Complete career application form with file upload
4. **Resume Upload** - PDF, DOC, DOCX support (Max 5MB)
5. **Responsive Design** - Mobile aur desktop dono par perfect
6. **AJAX Submission** - Page reload nahi hota

---

## 📋 **Page Sections:**

### 1. **Hero Section**
- Page header with breadcrumb navigation
- Animated scrolling ticker

### 2. **Why Join Us Section**
- Company benefits
- Work culture highlights
- Growth opportunities
- 4 key benefits with icons

### 3. **Open Positions Section**
- 4 job cards:
  - UI/UX Designer (Remote, Full-time, 2+ years)
  - Full Stack Developer (Remote, Full-time, 3+ years)
  - Digital Marketing Specialist (Remote, Full-time, 2+ years)
  - Content Writer (Remote, Full-time/Part-time, 1+ years)

### 4. **Application Form Section**
Form fields:
- ✅ Full Name *
- ✅ Email Address *
- ✅ Phone Number *
- ✅ Position Applied For * (Dropdown)
- ✅ LinkedIn Profile URL
- ✅ Portfolio/Website URL
- ✅ Years of Experience * (Dropdown)
- ✅ Current Location *
- ✅ Resume Upload * (PDF/DOC/DOCX, Max 5MB)
- ✅ Cover Letter / Why Join Us *

---

## 💾 **Data Storage:**

### **A. CSV File** 📁
- **File:** `career_applications.csv`
- **Location:** Same folder mein
- **Format:** Excel/CSV - easily open kar sakte ho
- **Columns:**
  - Date
  - Full Name
  - Email
  - Phone
  - Position
  - Experience
  - Location
  - LinkedIn
  - Portfolio
  - Resume File Name
  - Cover Letter

### **B. Resume Files** 📄
- **Folder:** `career_uploads/`
- **Format:** Original filename with timestamp
- **Example:** `1735574400_john_doe_resume.pdf`

### **C. Email Notification** 📧
- **Email To:** connect@aviukta.com
- **Subject:** "New Career Application: [Position] - [Name]"
- **Format:** Beautiful HTML email with all details
- **Includes:** All applicant information + resume file name

---

## 🚀 **Kaise Use Karein:**

### **Step 1: Server Setup**

**Local Testing (XAMPP):**
```bash
1. XAMPP install karein
2. Files ko htdocs/aviukta mein copy karein
3. Apache start karein
4. http://localhost/aviukta/career.html open karein
```

**Live Server:**
```bash
1. Files upload karein hosting par
2. PHP enabled hona chahiye
3. Write permissions check karein (career_uploads folder ke liye)
```

### **Step 2: Test Application**
1. Career page open karein
2. Form bharen (all required fields)
3. Resume upload karein (PDF/DOC/DOCX, max 5MB)
4. Submit button click karein
5. Success message dikhega

### **Step 3: Applications Dekhein**

**CSV File:**
```
aviukta/career_applications.csv
```
- Excel ya Google Sheets mein open karein
- All applications chronological order mein

**Resume Files:**
```
aviukta/career_uploads/
```
- Uploaded resumes yahan save honge
- Filename format: timestamp_originalname.pdf

**Email:**
- `connect@aviukta.com` inbox check karein
- Har application ka detailed email aayega

---

## 📁 **Files Created:**

### **New Files:**
1. ✅ `career.html` - Career page (main file)
2. ✅ `submit_career.php` - Backend processing
3. ✅ `CAREER_PAGE_README.md` - This documentation
4. ✅ `career_applications.csv` - Auto-created on first submission
5. ✅ `career_uploads/` - Folder auto-created for resumes

---

## 🎨 **Design Features:**

✅ **Consistent Theme** - Matches website design perfectly
✅ **Same Fonts** - Fustat font family
✅ **Same Colors** - Brand colors maintained
✅ **Same Components** - Reused existing CSS classes
✅ **Same Animations** - WOW.js animations
✅ **Same Layout** - Bootstrap grid system
✅ **Same Icons** - Font Awesome icons
✅ **Same Forms** - Contact form styling

---

## 🔧 **Technical Features:**

### **Frontend:**
- ✅ HTML5 semantic markup
- ✅ Bootstrap 5 responsive grid
- ✅ jQuery AJAX form submission
- ✅ Client-side validation
- ✅ File size validation (5MB max)
- ✅ File type validation (PDF, DOC, DOCX)
- ✅ Loading states
- ✅ Success/error messages

### **Backend (PHP):**
- ✅ Server-side validation
- ✅ File upload handling
- ✅ CSV data storage
- ✅ Email notifications
- ✅ XSS protection (htmlspecialchars)
- ✅ Email validation
- ✅ Unique filename generation
- ✅ Error handling

---

## 🛠️ **Customization:**

### **Add More Job Positions:**

Edit `career.html`, find the job listings section and add:

```html
<div class="col-lg-6 col-md-6">
    <div class="service-item wow fadeInUp" style="height: 100%;">
        <div class="service-item-header">
            <div class="icon-box">
                <img src="images/our-services-icon/1.png" alt="" />
            </div>
        </div>
        <div class="service-item-body">
            <h3>Your Job Title</h3>
            <p style="margin-bottom: 15px;">
                Job description here...
            </p>
            <p style="font-size: 14px; color: #999;">
                <i class="fa fa-map-marker-alt"></i> Location • Type • Experience
            </p>
        </div>
    </div>
</div>
```

### **Update Email Address:**

Edit `submit_career.php`, line ~150:
```php
$to = "your-hr-email@aviukta.com";
```

### **Change File Size Limit:**

Edit `submit_career.php`, line ~50:
```php
$max_file_size = 10 * 1024 * 1024; // 10MB
```

---

## 📊 **Application Data Format:**

### **CSV Structure:**
```csv
Date,Full Name,Email,Phone,Position,Experience,Location,LinkedIn,Portfolio,Resume File,Cover Letter
2025-12-30 21:30:00,John Doe,john@example.com,9876543210,UI/UX Designer,2-5,Mumbai,linkedin.com/in/john,johndoe.com,1735574400_resume.pdf,"I want to join because..."
```

---

## 🔐 **Security Features:**

- ✅ Input sanitization (htmlspecialchars)
- ✅ Email validation (FILTER_VALIDATE_EMAIL)
- ✅ File type validation (whitelist)
- ✅ File size validation (5MB limit)
- ✅ XSS protection
- ✅ SQL injection prevention (no database, using CSV)
- ✅ Unique filename generation (prevents overwrite)
- ✅ POST method only

---

## 📱 **Responsive Design:**

✅ Desktop (1920px+) - Full layout
✅ Laptop (1024px-1919px) - Optimized
✅ Tablet (768px-1023px) - 2 columns
✅ Mobile (320px-767px) - Single column

---

## 🎯 **Next Steps (Optional Enhancements):**

1. **Database Integration** - MySQL database instead of CSV
2. **Admin Panel** - View/manage applications
3. **Auto-Reply Email** - Send confirmation to applicants
4. **Application Status** - Track application progress
5. **Interview Scheduling** - Calendly integration
6. **ATS Integration** - Connect to Applicant Tracking System
7. **Video Resume** - Allow video upload option
8. **Skills Assessment** - Add online tests
9. **Referral System** - Employee referral tracking

---

## 🐛 **Troubleshooting:**

### **Resume Upload Nahi Ho Raha?**
- Check folder permissions (career_uploads/)
- Check PHP upload_max_filesize setting
- Check file size (max 5MB)
- Check file type (PDF, DOC, DOCX only)

### **Email Nahi Aa Rahe?**
- Check spam folder
- Server ka mail() function enabled hona chahiye
- Use PHPMailer for better email delivery

### **Form Submit Nahi Ho Raha?**
- Browser console check karein (F12)
- PHP errors check karein
- jQuery loaded hai ya nahi check karein

### **CSV File Nahi Ban Rahi?**
- Folder write permissions check karein
- PHP error logs check karein

---

## 📞 **Support:**

Koi problem ho to:
1. Browser console check karein (F12 → Console)
2. Server error logs check karein
3. PHP version check karein (min PHP 7.0+)
4. File permissions check karein (755 for folders, 644 for files)

---

## 🌟 **Features Highlights:**

### **For Applicants:**
- ✅ Easy application process
- ✅ Clear job descriptions
- ✅ Resume upload support
- ✅ Instant confirmation
- ✅ Mobile-friendly

### **For HR/Admin:**
- ✅ Organized data in CSV
- ✅ Email notifications
- ✅ Resume files saved
- ✅ All info in one place
- ✅ Easy to export/import

---

**Created:** 30 Dec 2025  
**Version:** 1.0  
**Developer:** Antigravity AI Assistant  
**Page URL:** `/career.html`
