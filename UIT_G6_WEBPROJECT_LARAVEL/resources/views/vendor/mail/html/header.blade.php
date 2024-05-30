@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://fontmeme.com/permalink/240508/a0a2db44cf95ee3c25441c8005f90516.png" style="wight:30%;" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
