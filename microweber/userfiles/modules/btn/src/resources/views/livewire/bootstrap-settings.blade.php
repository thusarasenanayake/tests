<div class="mb-3">

    <div>
        <label class="live-edit-label">{{__('Button Icon')}}</label>
        <livewire:microweber-option::icon-picker optionKey="icon" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

    @php
        $styleOptions = [
            'btn' => 'Normal',
            'btn-primary' => 'Primary',
            'btn-secondary' => 'Secondary',
            'btn-outline' => 'Outline',
            'btn-link' => 'Link',
        ];
    @endphp


    <div>
        <label class="live-edit-label">{{__('Button Style')}} </label>
        <livewire:microweber-option::dropdown :dropdownOptions="$styleOptions" optionKey="button_style" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

    @php
        $sizeOptions = [
            '' => 'Default',
            'btn-default-large btn-lg' => 'Large',
            'btn-default-medium btn-md' => 'Medium',
            'btn-default-small btn-sm' => 'Small',
            'btn-default-mini btn-xs' => 'Mini'
        ];
    @endphp

    <div>
        <label class="live-edit-label">{{__('Button Size')}} </label>
        <livewire:microweber-option::dropdown :dropdownOptions="$sizeOptions" optionKey="button_size" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

</div>
