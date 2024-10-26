<div>

    <div class="mt-4 mb-3">
        <label class="live-edit-label">Show products from</label>
        <livewire:microweber-option::dropdown :dropdownOptions="$shopPagesDropdownOptions" optionKey="dropdown" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

    <div>
        <label class="live-edit-label">Tags Filtering</label>
        <livewire:microweber-option::toggle-reversed optionKey="disable_tags_filtering" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

    <div>
        <label class="live-edit-label">Categories Filtering</label>
        <livewire:microweber-option::toggle-reversed optionKey="disable_categories_filtering" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

    <div>
        <label class="live-edit-label">Price Range Filtering</label>
        <livewire:microweber-option::toggle-reversed optionKey="disable_price_range_filtering" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

    <div>
        <label class="live-edit-label">Offers Filtering</label>
        <livewire:microweber-option::toggle-reversed optionKey="disable_offers_filtering" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

    <div>
        <label class="live-edit-label">Custom Fields Filtering</label>
        <livewire:microweber-option::toggle-reversed optionKey="disable_custom_fields_filtering" :optionGroup="$moduleId" :module="$moduleType"  />
    </div>

    @if (!empty($customFields))

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('customFieldsFiltering',  <?php if (get_option('disable_custom_fields_filtering', $moduleId) == 1): ?> false <?php else: ?> true <?php endif; ?>)
            });
            document.addEventListener('mw-option-saved', ($event) => {
                if ($event.detail.optionKey == 'disable_custom_fields_filtering') {
                    if ($event.detail.optionValue == 1) {
                        Alpine.store('customFieldsFiltering', false);
                    } else {
                        Alpine.store('customFieldsFiltering', true);
                    }
                }
            });
        </script>

        <div x-data x-show="$store.customFieldsFiltering">
            <table class="table">
                <tr>
                    <td>
                        <label class="live-edit-label">Custom Field</label>
                    </td>
                    <td>
                        <label class="live-edit-label">Filtering</label>
                    </td>
                </tr>
                @foreach($customFields as $customFieldKey=>$customFieldName)
                <tr>
                    <td>{{ $customFieldName }}</td>
                    <td>
                        <livewire:microweber-option::toggle-reversed optionKey="disable_custom_field_{{$customFieldKey}}" :optionGroup="$moduleId" :module="$moduleType"  />
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    @endif

</div>
