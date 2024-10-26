@if (!\MicroweberPackages\Multilanguage\MultilanguageHelpers::multilanguageIsEnabled())

    <x-microweber-ui::label for="{{$randId}}" :value="$labelText" />
    <x-microweber-ui::input id="{{$randId}}" class="block w-full" wire:model.lazy="state.{{$fieldName}}" />

@else



<div x-data="{
currentLanguageData: @js($currentLanguageData)
}"
     x-init="function() {
mw.on('mlChangedLanguage', function (e, mlCurrentLanguage) {
    currentLanguageData = mlCurrentLanguage;
});
}"
>

    @if(!empty($labelText))
    <label class="live-edit-label" for="type">
        {{ $labelText }}
    </label>
    @endif

    <div class="input-group">

        @foreach($supportedLanguages as $language)

            <input

                @if($language['locale'] == $defaultLanguage)

                wire:model.lazy="state.{{$fieldName}}"
                @else
                wire:model.lazy="state.multilanguage.{{$fieldName}}.{{$language['locale']}}"
                style="display:none"
                @endif

                x-show="currentLanguageData.locale == '{{$language['locale']}}'"
                :dir="function() {
                    return mw.admin.rtlDetect.getLangDir('{{$language['locale']}}')
                    }"
                lang="{{$language['locale']}}"

                type="text" class="form-control">
        @endforeach

        <button data-bs-toggle="dropdown" type="button" class="btn dropdown-toggle dropdown-toggle-split gap-2" aria-expanded="false">
            <i :class="function () {
                    return 'flag-icon flag-icon-'+currentLanguageData.icon+' mr-4';
            }"></i>
        </button>

        <div class="dropdown-menu dropdown-menu-end">
            @foreach($supportedLanguages as $language)
                <a class="dropdown-item" href="#" x-on:click="function() {
                        currentLanguageData = @js($language);
                        mw.trigger('mlChangedLanguage', currentLanguageData);
                }">
                    <i class="flag-icon flag-icon-{{$language['icon']}} mr-4"></i>
                    <span> {{strtoupper($language['locale'])}}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endif
