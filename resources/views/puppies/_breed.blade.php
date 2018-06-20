@if ($puppies['breed'] == 1)
    {!! __('puppies.terrier') !!}
@elseif($puppies['breed'] == 2)
    {!! __('puppies.beagle') !!}
@elseif($puppies['breed'] == 3)
    {!! __('puppies.retriever') !!}
@elseif($puppies['breed'] == 4)
    {!! __('puppies.chihuahua') !!}
@endif