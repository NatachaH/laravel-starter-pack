<x-bs-input class="col" :before="trans_choice('backend.model.user',1)" name="search[user]" :value="$search ? $search->attribute('user') : null" />

<x-bs-datepicker class="col datepicker-automatic" :before="__('sp::field.start-at')" name="search[start_at]" mode="single" format="datetime" :value="$search ? $search->attribute('start_at') : null" />
<x-bs-datepicker class="col datepicker-automatic" :before="__('sp::field.end-at')" name="search[end_at]" mode="single" format="datetime" min="search[start_at]" :value="$search ? $search->attribute('end_at') : null" />
