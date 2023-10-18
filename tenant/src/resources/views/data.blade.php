@php
    $count = 0;
@endphp
<pre>
{{-- json_encode($data,JSON_PRETTY_PRINT) --}}
@foreach ($data as $users)
@foreach ($users->tasks as $task)
@php $count++ @endphp
{{ json_encode($task, JSON_PRETTY_PRINT) }}
@endforeach
@endforeach
</pre>
COUNT : {{ $count }}
