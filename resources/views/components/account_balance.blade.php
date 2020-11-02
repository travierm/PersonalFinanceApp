@php
$textClass = ($currentAccountBalance >= 1 ? 'text-success' : 'text-danger')
@endphp
<h5>Current Account Balance: <span class="{{ $textClass }}">${{ $currentAccountBalance }}</span></h5>
