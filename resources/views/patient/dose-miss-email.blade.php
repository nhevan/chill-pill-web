@component('mail::message')
Dear User,

You are receiving this email because {{ $patient->user->name }} has selected you as his/her emergency contact.

<strong>Your patient {{ $patient->user->name }} just missed a dose. Please contact the patient and request to take due medicines ASAP</strong><br>
<br>
<br>
Thank you again for using Chill Pill.
<br>
<br>
<img src="https://image.ibb.co/fsPPSF/chill_pill_logo_2.png" alt="Chill Pill" style="width: 100px;"/>
<br>
Email : <support@chill-pill.com><br>
Website : [www.chill-pill.com](www.chill-pill.com)
@endcomponent