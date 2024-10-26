@props(['options'=>[]])

@php
    $md5InputElement = md5(time().rand(1111,9999));

    $preformatedOptions = [];
    $selectedOption = [];
    if (isset($options) && !empty($options)) {
        foreach ($options as $key => $option) {
            $preformatedOptions[] = [
                'key' => $key,
                'value' => $option
            ];
        }
        $selectedOption = $preformatedOptions[0];
    }
@endphp


<div class="form-control-live-edit-label-wrapper"
     x-data="{selectedOption: {{json_encode($selectedOption)}}, openOptions:false}"
     x-init="() => {
        $watch('selectedOption', value => {
            if(!value){
                return;
             }
           let inputElement = document.getElementById('{{$md5InputElement}}');
            if(!inputElement){
                return;
             }
           inputElement.value = value.key;
           inputElement.dispatchEvent(new Event('input'));
        });
     }"
>

    <input type="hidden" id="{{$md5InputElement}}" {!! $attributes->merge() !!} />

    <button type="button" class="form-select form-control-live-edit-input"
            x-on:click="openOptions = !openOptions" x-html="selectedOption.value">
    </button>

    <div class="dropdown-menu form-control-live-edit-input ps-0" :class="[openOptions ? 'show':'']">

        @if(!empty($preformatedOptions))
            @foreach($preformatedOptions as $option)

                <button type="button"
                        x-on:click="selectedOption = {{json_encode($option)}}; openOptions = false" :class="[selectedOption.key == '{{$option['key']}}' ? 'active':'']" class="dropdown-item tblr-body-color">
                    {!! $option['value'] !!}
                    <span class="ms-auto" x-show="selectedOption.key == '{{$option['key']}}'">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 -960 960 960" width="16"><path d="M378-246 154-470l43-43 181 181 384-384 43 43-427 427Z"/></svg>
                    </span>
                </button>

            @endforeach
        @endif
    </div>

</div>
