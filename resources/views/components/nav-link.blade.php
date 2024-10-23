@props(['active'=>false,'type'=>'a'])

@if($type=='a')
    <a class="{{ $active ? "bg-gray-900 text-white" :"text-gray-300 hover:bg-gray-700 hover:text-white"}} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{$active ? "page":'false'}}" {{$attributes}}>
        {{$slot}}</a>
@else
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        {{$slot}}
    </button>
@endif
