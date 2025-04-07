@props(['name'])

@error($name)
<p class="text-xs text-red-400 mt-1">
    {{$message}}
</p>
@enderror
