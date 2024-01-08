@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <a class="flex items-center justify-between px-3 py-2 font-semibold text-white bg-gray-800 rounded-md shadow-md w-fit focus:outline-none focus:shadow-outline-purple"
            href="{{ route('qns.result_detail', $selected->question->qns->id) }}">
            <div class="flex items-center">
                <i class="w-5 fa-solid fa-arrow-left"></i>
                <span class="">Kembali</span>
            </div>
        </a>
        <h4 class="my-4 text-lg font-semibold text-gray-600 ">
            Edit Jawaban Survey
        </h4>
        <form action="{{ route('qns_selected_option.update', $selected->id) }}" method="post"
            onsubmit="return checkIfChecked()" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <hr class="my-4 border border-gray-400">
            <span class="font-semibold text-gray-600">{{ $selected->question->text }}</span>
            <div class="flex flex-col w-full my-3 gap-y-4 question-container">
                <div class="grid grid-cols-1 gap-2 p-3 bg-gray-100 rounded-md sm:grid-cols-2 question-row">
                    <div class="gap-1 col-span-full option-container">
                        <div class="flex items-center w-full option-row gap-x-3">
                            <div class="flex flex-col w-full gap-2 option-list">
                                @switch($selected->question->type)
                                    @case('pilgan')
                                        @foreach ($selected->question->option as $option)
                                            <div class="flex items-center gap-x-3">
                                                <input type="radio" name="option" class="" value="{{ $option->id }}"
                                                    {{ $selected->option_id == $option->id ? 'checked' : '' }} required>
                                                <span class="font-semibold">{{ $option->text }}</span>
                                            </div>
                                        @endforeach
                                    @break

                                    @case('isian')
                                        <input type="text" name="other_text" class="p-3 text-neutral-800 form-input"
                                            value="{{ $selected->other_text }}" required>
                                    @break

                                    @case('pilgan_isian')
                                        @foreach ($selected->question->option as $option)
                                            <div class="flex items-center gap-x-3">
                                                <input type="radio" name="option" class="other_option"
                                                    value="{{ $option->id }}"
                                                    {{ $selected->option_id == $option->id ? 'checked' : '' }} required>
                                                <span class="font-semibold">{{ $option->text }}</span>
                                            </div>
                                        @endforeach
                                        <div class="flex items-center gap-x-3">
                                            <input type="radio" name="option" id="other" class="other_option other"
                                                value="" {{ $selected->option_id == null ? 'checked' : '' }} required>
                                            <span class="font-semibold">Lainnya</span>
                                        </div>
                                        <input type="text" name="other_text" id="other_text"
                                            class="p-3 text-neutral-800 form-input" value="{{ $selected->other_text }}"
                                            {{ $selected->option_id == null ? '' : 'disabled' }} required>
                                    @break

                                    @case('kotak_centang')
                                        @foreach ($selected->question->option as $option)
                                            <div class="flex items-center gap-x-3">
                                                <input type="checkbox" name="options[]" class="" value="{{ $option->id }}"
                                                    {{ in_array($option->id, $checkbox) ? 'checked' : '' }}>
                                                <span class="font-semibold">{{ $option->text }}</span>
                                            </div>
                                        @endforeach
                                        @error('options')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    @break

                                    @default
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="w-full px-3 py-2 font-semibold text-white transition-all bg-gray-800 rounded-md hover:bg-gray-900">Submit</button>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            function checkIfChecked() {
                // Get all checkboxes in the form
                var checkboxes = document.querySelectorAll('input[name="options"]');

                // Iterate through checkboxes to check if at least one is checked
                var atLeastOneChecked = false;
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        atLeastOneChecked = true;
                        break;
                    }
                }

                // Display a message based on the result
                if (atLeastOneChecked) {
                    return true
                } else {
                    alert('Wajib ceklis salah satu');
                    return false
                }
            }

            $('.other_option').change(function() {
                let checked = $(this).hasClass('other');
                // console.log($(this).parent().siblings('.other_label').find('.other_text'));

                if (checked) {
                    $("#other_text").prop('disabled', (i, v) =>
                        v = false);
                } else {
                    $("#other_text").prop('disabled', (i, v) =>
                        v = true);
                }
            })
        });
    </script>
@endsection
