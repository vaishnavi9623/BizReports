<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vendor Report Submission</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f7f9fb;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
            padding: 30px;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
            color: #444;
        }
        .content {
            padding: 20px 0;
            line-height: 1.6;
            font-size: 15px;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #e0f0ff;
            color: #0052cc;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            border: 1px solid #c2e0ff;
        }
        .button:hover {
            background-color: #d1eaff;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #999;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Monthly Report Submission</h1>
        </div>
        <div class="content">
            <p>Hi {{ $data['name'] }},</p>

            <p>{{ $data['content'] }}</p>

            <a href="https://example.com/reports/REP-2025-03-001.pdf" class="button">Download Report</a>

            <p>If you have any questions, feel free to reach out.</p>

            <p>Thanks,<br><strong>InnovaCraft Pvt Ltd</strong></p>
        </div>
        <div class="footer">
            &copy; InnovaCraft Pvt Ltd
        </div>
    </div>
</body>
</html>
