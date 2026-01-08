# 🎯 Webhook Integration - Vercel Compatible

## 📋 Overview
Since Vercel doesn't support PHP, we've updated both **Career** and **Contact** forms to send data directly to **Make.com webhooks** using JavaScript `fetch()` API.

---

## ✅ What Was Changed

### 1. **Career Form** (`career.html`)
- **Old Method**: Form submitted to `submit_career.php` via AJAX
- **New Method**: Form data sent directly to Make.com webhook via `fetch()`
- **Webhook URL**: `https://hook.eu1.make.com/dvbxdu0p9jb3651fjywi8k1qithb1l33`

**Data Sent to Webhook:**
```json
{
  "form_type": "Career Application",
  "full_name": "John Doe",
  "email": "john@example.com",
  "phone": "+91 1234567890",
  "position": "UI/UX Designer",
  "linkedin": "https://linkedin.com/in/johndoe",
  "portfolio": "https://johndoe.com",
  "experience": "2-5",
  "location": "Mumbai",
  "cover_letter": "I want to join because...",
  "resume_filename": "john_doe_resume.pdf",
  "submitted_at": "2026-01-08T11:30:00.000Z",
  "timestamp": 1704710400000
}
```

---

### 2. **Contact Form** (`contact.html`)
- **Old Method**: Form submitted to `submit_contact.php` via AJAX
- **New Method**: Form data sent directly to Make.com webhook via `fetch()`
- **Webhook URL**: `https://hook.eu1.make.com/s3nc30dr72nsbifjwj4n4z47v35ivql4`

**Data Sent to Webhook:**
```json
{
  "form_type": "Contact Form",
  "first_name": "John",
  "last_name": "Doe",
  "full_name": "John Doe",
  "phone": "+91 1234567890",
  "email": "john@example.com",
  "message": "I would like to discuss a project...",
  "submitted_at": "2026-01-08T11:30:00.000Z",
  "timestamp": 1704710400000
}
```

---

## 🔧 Technical Implementation

### JavaScript Fetch API
Both forms now use modern `fetch()` API instead of jQuery AJAX:

```javascript
fetch('WEBHOOK_URL', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(webhookData)
})
.then(response => {
    if (response.ok) {
        // Show success message
        // Reset form
    } else {
        throw new Error('Submission failed');
    }
})
.catch(error => {
    // Show error message
})
.finally(() => {
    // Re-enable submit button
});
```

---

## 🚀 Benefits

1. **✅ Vercel Compatible**: No PHP required, works on static hosting
2. **✅ Direct Integration**: Data goes straight to Make.com
3. **✅ Real-time**: Instant webhook triggers
4. **✅ Reliable**: No server-side dependencies
5. **✅ Scalable**: Serverless architecture

---

## 📝 Important Notes

### Resume File Handling
- **Career Form**: Resume file is NOT uploaded to webhook
- Only the **filename** is sent in the webhook data
- If you need actual file upload, you'll need to:
  1. Use a file upload service (Cloudinary, AWS S3, etc.)
  2. Upload file first, get URL
  3. Send URL in webhook data

### PHP Files
The following PHP files are **still present** but **NOT USED** on Vercel:
- `submit_career.php` - Can be deleted or kept for local testing
- `submit_contact.php` - Can be deleted or kept for local testing

---

## 🧪 Testing

### Test Career Form:
1. Go to `/career.html`
2. Fill out the form
3. Upload a resume (filename will be captured)
4. Submit
5. Check Make.com webhook logs

### Test Contact Form:
1. Go to `/contact.html`
2. Fill out the form
3. Submit
4. Check Make.com webhook logs

---

## 🔗 Make.com Setup

### Career Webhook
- **URL**: `https://hook.eu1.make.com/dvbxdu0p9jb3651fjywi8k1qithb1l33`
- **Method**: POST
- **Content-Type**: application/json

### Contact Webhook
- **URL**: `https://hook.eu1.make.com/s3nc30dr72nsbifjwj4n4z47v35ivql4`
- **Method**: POST
- **Content-Type**: application/json

---

## 🛠️ Troubleshooting

### Form Not Submitting?
1. Check browser console for errors
2. Verify webhook URLs are correct
3. Check Make.com scenario is active
4. Test webhook URL directly with Postman

### CORS Issues?
- Make.com webhooks should allow CORS by default
- If issues persist, check Make.com scenario settings

### Success Message Not Showing?
- Check if `response.ok` is true
- Verify Make.com returns 200 status code
- Check browser console for errors

---

## 📊 Data Flow

```
User fills form
    ↓
JavaScript validates
    ↓
fetch() sends JSON to Make.com
    ↓
Make.com receives data
    ↓
Make.com processes (email, database, etc.)
    ↓
Success response
    ↓
User sees confirmation message
```

---

## 🎉 Deployment Ready!

Your forms are now **100% Vercel compatible** and ready to deploy! 🚀

No PHP required, no server-side code needed - just pure JavaScript magic! ✨
