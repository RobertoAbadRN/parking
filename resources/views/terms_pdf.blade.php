<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .heading {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .section-content {
            margin-left: 20px;
        }
        .user-info {
            margin-top: 40px;
        }
        .user-info p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">       
        <div class="section user-info">
            <h3 class="section-title">User Information:</h3>
            <div class="section-content">
                <p>Name: {{ $user->name }}</p>
                <p>Agreement Token: {{ $department->agreement_token }}</p>
                <p>Terms Agreement Status: {{ $department->terms_agreement_status }}</p>
                <p>Date Status: {{ $department->date_status }}</p>
            </div>
        </div>
        <div class="section heading">
            <h2 class="heading">Permit Agreement</h2>
        </div>
        <div class="section">
            <div class="section-content">
                <p>This Agreement is an addendum and is a part of the Apartment Lease Contract, made and entered
                    into between 3rd. Street Apartments, and Resident(s) as listed below:</p>
                <p>By signing this addendum, I/We agree to the following:</p>
                <ul class="list-disc ml-6 mb-6">
                    <li>I understand that a parking permit will be issued for each apartment. Parking permits will
                        not be issued to occupants. I agree to place the parking permit just above my vehicle
                        Inspection/Registration stickers.</li>
                    <li>I understand that each permit is designated to a specific vehicle and may not be exchanged
                        to another vehicle. I understand that the permit assigned is based on the vehicle license
                        plate information. I also agree that if I obtain a new vehicle I agree to return the old
                        permit.</li>
                    <li>The parking permit will expire the last day of the current lease. I understand I must renew
                        my parking permit when my current lease agreement expires. I also understand that proof of
                        vehicle registration and proof of valid vehicle insurance are required before permit(s) will
                        be issued and/or renewed.</li>
                    <li>I understand that visitors may not park inside of the access gates at anytime. All visitor
                        parking is designated outside the gates at all times. I understand that any vehicle parked
                        in the designated Future Resident Parking outside of the access gates must be moved during
                        office hours each day.</li>
                    <li>I understand I may not park boats, trailers, recreational vehicles or commercial vehicles at
                        the property, anywhere or at anytime. Vehicles must be driven on a regular basis and cannot
                        be left abandoned or inoperable at time.</li>
                    <li>I understand that if a vehicle is towed, I may contact A. Martinez Towing Company LLC, 24
                        hours a day, at 832-374-7703.</li>
                    <li>If a vehicle is park inside the gates without permit, I may contact the towing service
                        directly to have the vehicle removed. All vehicles toward will be at vehicle
                        owner/operator's expense.</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
