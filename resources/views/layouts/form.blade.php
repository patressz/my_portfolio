@component('mail::message')
<h1>
    Odosielateľ: {{ $contact['name'] }}
</h1>
<h2>
    Email: {{ $contact['email'] }}
</h2>

@component('mail::table')
||Správa||
|-|:-:|-:|
@endcomponent
@component('mail::panel')
{{ $contact['content'] }}
@endcomponent
@endcomponent

