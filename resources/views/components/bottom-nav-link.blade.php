@props(['link'=>'', 'active'=>false])
<?php
    if($active){
        $classes = 'flex flex-col items-center bg-tertiary text-primary rounded-md p-2';
    }else{
        $classes = 'flex flex-col items-center  p-2';
    }
    ?>
<a href="{{$link}}" {{ $attributes->merge(['class' => $classes]) }}>
    {{$slot}}
</a>
