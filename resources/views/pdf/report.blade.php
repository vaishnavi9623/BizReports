<!DOCTYPE html>
<html>
<head>
    <title>Report PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 40px;
            background-color: #ffffff;
            color: #333;
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #4dbfba;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #4dbfba;
        }

        .section {
            margin-top: 30px;
        }

        .section-title {
            font-size: 18px;
            margin-bottom: 10px;
            color: #4dbfba;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 14px;
            vertical-align: top;
        }

        th {
            background-color: #f0f8f7;
            color: #333;
        }

        .info-table td {
            border: none;
            padding: 5px 0;
        }

        .info-label {
            font-weight: bold;
            width: 180px;
        }

        .status-draft {
            background-color: #ffeeba;
            color: #856404;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Monthly Sales Report</h1>
    </div>

    <div class="section">
        <div class="section-title">Client & Job Details</div>
        <table class="info-table">
            <tr>
                <td class="info-label">Client Name:</td>
                <td>{{ $report->clientname }}</td>
            </tr>
            <tr>
                <td class="info-label">Client Address:</td>
                <td>{{ $report->clientaddress }}</td>
            </tr>
            <tr>
                <td class="info-label">Job Name:</td>
                <td>{{ $report->jobname }}</td>
            </tr>
            <tr>
                <td class="info-label">Job No:</td>
                <td>{{ $report->jobno }}</td>
            </tr>
            <tr>
                <td class="info-label">Report No:</td>
                <td>{{ $report->reportno }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Report Summary</div>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Reported By</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $report->title }}</td>
                    <td>{{ $report->date_of_rt }}</td>
                    <td>{{ $report->reported_by }}</td>
                    <td>
                        @if($report->status == 'Draft')
                            <span class="status-draft">{{ $report->status }}</span>
                        @else
                            {{ $report->status }}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Description</div>
        <p>{{ $report->description }}</p>
    </div>

</body>
</html>
