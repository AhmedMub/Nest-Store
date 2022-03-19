@if ($sortBy !== $field)
<i class="bi bi-arrow-down"></i>
@elseif($sortDirection == 'asc')
<i class="bi bi-arrow-up"></i>
@else
<i class="bi bi-arrow-down"></i>
@endif
