@component('mail::message')
# Your Flight Ticket

Here are the details of your flight ticket:

Flight Number: {{ $ticket->flight_number }}
Departure: {{ $ticket->departure }}
Destination: {{ $ticket->destination }}
Departure Date: {{ $ticket->departure_date }}
Departure Time: {{ $ticket->departure_time }}

Thank you for choosing our airline.

@component('mail::button', ['url' => ''])
View Ticket
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
