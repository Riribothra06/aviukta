# 📧 Contact Form Setup - Aviukta Website

## ✅ Kya Kiya Gaya Hai:

### 1. **Dustbin Folder**
- **Location:** `c:\Users\Asus\Desktop\avi\aviukta\Dustbin`
- **Contents:** Purane/unused PHP files (404, FAQs, pricing, team pages, galleries, etc.)
- **Purpose:** Backup files jo currently use nahi ho rahe

### 2. **Contact Form Data Storage**

Ab contact form ka data **2 jagah** save hoga:

#### 📁 **CSV File mein** (Local Storage)
- **File:** `contact_submissions.csv`
- **Location:** Same folder mein jahan `submit_contact.php` hai
- **Format:** Excel/CSV format - aap easily open kar sakte ho
- **Columns:** Date, First Name, Last Name, Phone, Email, Message

#### 📧 **Email mein** (Email Notification)
- **Email Address:** connect@aviukta.com
- **Subject:** "New Contact Form Submission from [Name]"
- **Format:** Beautiful HTML formatted email with all details

---

## 🚀 Kaise Use Karein:

### **Step 1: Server Setup**
Aapko PHP server ki zarurat hai. Options:

**Option A: XAMPP/WAMP (Local Testing)**
1. XAMPP install karein
2. Files ko `htdocs` folder mein copy karein
3. Apache start karein
4. Browser mein open karein: `http://localhost/aviukta/contact.html`

**Option B: Live Server (Production)**
1. Files ko apne hosting server par upload karein
2. Make sure PHP enabled hai
3. Email functionality ke liye SMTP configure karein (optional)

### **Step 2: Form Submit Karein**
1. Contact page par jaayein
2. Form bharen (all fields required hain)
3. "Submit Message" button click karein
4. Success/Error message dikhega

### **Step 3: Data Dekhein**

**CSV File Check Karein:**
```
aviukta/contact_submissions.csv
```
- Excel ya Notepad se open karein
- Saare submissions chronological order mein honge

**Email Check Karein:**
- `connect@aviukta.com` inbox check karein
- Har submission ka ek formatted email aayega

---

## 📋 Files Created/Modified:

### **New Files:**
1. ✅ `submit_contact.php` - Backend processing file
2. ✅ `contact_submissions.csv` - Auto-created jab pehla form submit hoga
3. ✅ `CONTACT_FORM_README.md` - Ye file

### **Modified Files:**
1. ✅ `contact.html` - Form action updated, AJAX handler added

---

## 🔧 Features:

✅ **Form Validation** - Client-side aur server-side dono
✅ **AJAX Submission** - Page reload nahi hoga
✅ **Success/Error Messages** - User-friendly feedback
✅ **CSV Storage** - Easy data export
✅ **Email Notifications** - Instant alerts
✅ **Data Sanitization** - Security ke liye
✅ **Responsive Design** - Mobile-friendly
✅ **Loading State** - Button "Sending..." dikhayega

---

## 🛠️ Troubleshooting:

### **Email Nahi Aa Rahe?**
- Check spam folder
- Server ka mail() function enabled hona chahiye
- Alternative: Use PHPMailer ya SMTP service (Gmail, SendGrid, etc.)

### **CSV File Nahi Ban Rahi?**
- Check folder permissions (write permission chahiye)
- Server error logs check karein

### **Form Submit Nahi Ho Raha?**
- Browser console check karein (F12)
- PHP errors check karein
- Make sure jQuery loaded hai

---

## 📊 Data Format (CSV):

```csv
Date,First Name,Last Name,Phone,Email,Message
2025-12-30 21:00:00,Manish,Kumar,7738241235,test@example.com,Hello this is a test message
```

---

## 🔐 Security Features:

- ✅ Input sanitization (htmlspecialchars)
- ✅ Email validation (FILTER_VALIDATE_EMAIL)
- ✅ XSS protection
- ✅ Required field validation
- ✅ POST method only

---

## 📞 Support:

Koi problem ho to:
1. Browser console check karein (F12 → Console tab)
2. Server error logs check karein
3. PHP version check karein (minimum PHP 7.0+)

---

## 🎯 Next Steps (Optional Enhancements):

1. **Database Integration** - MySQL database mein store karein
2. **Admin Panel** - Submissions dekhne ke liye dashboard
3. **Auto-Reply Email** - User ko confirmation email bhejein
4. **reCAPTCHA** - Spam protection
5. **File Upload** - Documents attach karne ka option
6. **SMS Notification** - WhatsApp/SMS alerts

---

**Created:** 30 Dec 2025  
**Version:** 1.0  
**Developer:** Antigravity AI Assistant
