<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Notification</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f9; color: #333; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #18153d;">APPOINTMENT DATE NOTIFICATION</h2>

        <p>Dear Guardian,</p>

        <p>We hope this message finds you well. We would like to inform you that an appointment has been scheduled for your child, <strong>{{ $student->full_name }}</strong>, at <strong>Synergy College</strong>.</p>

        <p><strong>Appointment Details:</strong></p>
        <ul>
            <li><strong>Date:</strong> {{ $student->appointment_date }}</li>
            <li><strong>Location:</strong> Synergy College Campus</li>
        </ul>

        <p>To confirm your attendance, please use the following verification number when you visit the appointment page:</p>

        <div style="text-align: center; margin: 20px 0;">
            <span style="font-size: 24px; font-weight: bold; background: #ea2328; color: #fff; padding: 10px 20px; border-radius: 5px; display: inline-block;">
                {{ $appoiment->verification_code }}
            </span>
        </div>

        <p>Please keep this verification number confidential as it will be used to verify your appointment. If you have any questions, feel free to contact us at <a href="mailto:info@synergycollege.edu">info@synergycollege.edu</a>.</p>

        <p>Thank you for your attention and cooperation.</p>

        <p>Best regards,</p>
        <p><strong>Synergy College Administration</strong></p>
    </div>
</body>
</html>
