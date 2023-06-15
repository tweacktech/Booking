<!DOCTYPE html>
<html>
<head>
    <title>Flight Ticket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }

        .ticket {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .airline-logo {
            width: 80px;
        }

        .ticket-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .info-column {
            flex: 1;
        }

        .info-column:first-child {
            margin-right: 20px;
        }

        .passenger-info {
            margin-bottom: 20px;
        }

        .passenger-name {
            font-size: 20px;
            font-weight: bold;
        }

        .flight-info {
            margin-bottom: 20px;
        }

        .flight-number {
            font-size: 18px;
            font-weight: bold;
        }

        .barcode {
            text-align: center;
        }

        .barcode img {
            max-width: 100%;
        }

        .btn-pdf {
            display: block;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <img src="{{ asset('images/airline-logo.png') }}" alt="Airline Logo" class="airline-logo">
            <h1>Flight Ticket</h1>
        </div>

        <div class="ticket-info">
            <div class="info-column">
                <div class="passenger-info">
                    <p class="passenger-name">{{ $passenger->name }}</p>
                    <p><strong>Email:</strong> {{ $passenger->email }}</p>
                </div>

                <div class="flight-info">
                    <p><strong>Departure:</strong> New York</p>
                    <p><strong>Destination:</strong> London</p>
                    <p><strong>Departure Date:</strong> June 10, 2023</p>
                    <p><strong>Departure Time:</strong> 09:00 AM</p>
                </div>
            </div>

            <div class="info-column">
                <p class="flight-number">Flight Number: XYZ123</p>
                <p><strong>Airline:</strong> XYZ Airlines</p>
                <p><strong>Gate:</strong> 7B</p>
                <p><strong>Seat:</strong> 12A</p>
            </div>
        </div>

        <div class="barcode">
            <img src="{{ asset('images/barcode.png') }}" alt="Barcode">
        </div>

        <a href="{{ route('ticket.download', $passenger->id) }}" class="btn btn-primary btn-pdf" target="_blank">Download PDF</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
