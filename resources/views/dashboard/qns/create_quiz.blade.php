@extends('layouts.dashboard.app')
@section('content')
    <div class="container grid px-6 py-6 mx-auto">
        <a class="flex items-center justify-between px-3 py-2 font-semibold text-white bg-gray-800 rounded-md shadow-md w-fit focus:outline-none focus:shadow-outline-purple"
            href="{{ route('qns.index') }}">
            <div class="flex items-center">
                <i class="w-5 fa-solid fa-arrow-left"></i>
                <span class="">Kembali</span>
            </div>
        </a>
        <h4 class="my-4 text-lg font-semibold text-gray-600 ">
            Buat Quiz
        </h4>
        <form action="{{ route('qns.store') }}" method="post" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            @csrf
            <input type="hidden" name="type" value="quiz">
            <input type="hidden" name="question_total" value="1" id="question_total">
            <input type="hidden" name="option_total" value="1" id="option_total">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Nama*
                    </span>
                    <input type="text" name="name" class="form-input" placeholder="Nama" required />
                    @error('name')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Durasi (Menit)*
                    </span>
                    <input type="number" name="duration" class="form-input" placeholder="Durasi" required />
                    @error('duration')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Tanggal Mulai
                    </span>
                    <input type="date" name="start_date" class="form-input" />
                    @error('start_date')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 ">
                        Tanggal Selesai
                    </span>
                    <input type="date" name="end_date" class="form-input" />
                    @error('end_date')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <label class="block text-sm col-span-full">
                    <span class="text-gray-700 ">
                        Deskripsi
                    </span>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-input"></textarea>
                    @error('description')
                        <span class="text-xs text-red-600 ">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
            </div>
            <hr class="my-4 border border-gray-400">
            <span class="font-semibold text-gray-600">Jumlah Pertanyaan : <span id="count-soal">1</span></span>
            <div class="flex flex-col w-full my-3 gap-y-4 question-container">
                <div class="grid grid-cols-1 gap-2 p-3 bg-gray-100 rounded-md question-row">
                    <div class="flex ml-auto col-span-full gap-x-4 question-action">
                        <span class="text-lg cursor-pointer text-emerald-600 add-question"><i
                                class="inline-block fa-solid fa-circle-plus"></i>
                        </span>
                    </div>
                    <label class="block text-sm">
                        <span class="text-gray-700 ">
                            Pertanyaan*
                        </span>
                        <input type="text" name="question[]" class="form-input" placeholder="Pertanyaan" required />
                    </label>
                    <div class="gap-1 col-span-full option-container">
                        <input type="hidden" name="option_count[]" value="1" class="option_count">
                        <div class="flex items-center flex-grow w-full option-row gap-x-3">
                            <div class="flex flex-col w-9/12 gap-2 option-list">
                                <input type="text" name="option[]" class="option-item form-input" placeholder="Opsi"
                                    required>
                            </div>
                            <div class="flex items-center gap-x-4 option-action">
                                <span class="text-lg cursor-pointer text-emerald-600 add-option"><i
                                        class="inline-block fa-solid fa-circle-plus"></i>
                                </span>
                                <label class="flex items-center text-xs text-blue-900 cursor-pointer sm:text-sm gap-x-1 ">
                                    <input type="radio" name="correct_option_1" class="correct_option" value="0"
                                        required>
                                    Opsi benar
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="w-full px-3 py-2 font-semibold text-white transition-all bg-gray-800 rounded-md hover:bg-gray-900">
                Submit
            </button>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // let question_template = $(".question-row").first();
            let count_soal = $("#count-soal");
            let option_total = $("#option_total").val()
            let question_total = $("#question_total").val()

            let question_template = `<div
                    class="grid grid-cols-1 gap-2 p-3 bg-gray-100 rounded-md question-row">
                    <div class="flex ml-auto col-span-full gap-x-4 question-action">
                        <span class="text-lg cursor-pointer text-emerald-600 add-question"><i
                                class="inline-block fa-solid fa-circle-plus"></i>
                        </span>
                        <span class="text-lg cursor-pointer text-premier delete-question"><i
                                class="inline-block fa-solid fa-trash"></i>
                        </span>
                    </div>
                    <label class="block text-sm">
                        <span class="text-gray-700 ">
                            Pertanyaan*
                        </span>
                        <input type="text" name="question[]" class="form-input" placeholder="Pertanyaan" required/>
                    </label>
                    <div class="gap-1 col-span-full option-container">
                        <input type="hidden" name="option_count[]" value="1" class="option_count">
                        <div class="flex items-center w-full option-row gap-x-3">
                            <div class="flex flex-col w-9/12 gap-2 option-list">
                                <input type="text" name="option[]" class="option-item form-input" placeholder="Opsi" required>
                            </div>
                            <div class="flex items-center gap-x-4 option-action">
                                <span class="text-lg cursor-pointer text-emerald-600 add-option"><i
                                        class="inline-block fa-solid fa-circle-plus"></i>
                                </span>
                                <label class="flex items-center text-xs text-blue-900 cursor-pointer sm:text-sm gap-x-1 ">
                                    <input type="radio" name="correct_option_${question_total}" class="correct_option">
                                    Opsi benar
                                </label>
                            </div>
                        </div>
                    </div>
                </div>`;

            let option_row =
                `<div class="flex items-center w-full option-row gap-x-3">
                    <div class="flex flex-col w-9/12 gap-2 option-list">
                        <input type="text" name="option[]" class="option-item form-input" placeholder="Opsi" required>
                    </div>
                    <div class="flex items-center gap-x-4 option-action">
                        <span class="text-lg cursor-pointer text-emerald-600 add-option"><i
                                class="inline-block fa-solid fa-circle-plus"></i>
                        </span>
                        <span class="text-lg cursor-pointer text-premier delete-option"><i
                                class="inline-block fa-solid fa-trash"></i>
                        </span>
                        <label class="flex items-center text-xs text-blue-900 cursor-pointer sm:text-sm gap-x-1 ">
                            <input type="radio" name="correct_option_${question_total}" class="correct_option">
                            Opsi benar
                        </label>
                    </div>
                </div>`;

            const qt = (qt) => {
                return `<div
                    class="grid grid-cols-1 gap-2 p-3 bg-gray-100 rounded-md question-row">
                    <div class="flex ml-auto col-span-full gap-x-4 question-action">
                        <span class="text-lg cursor-pointer text-emerald-600 add-question"><i
                                class="inline-block fa-solid fa-circle-plus"></i>
                        </span>
                        <span class="text-lg cursor-pointer text-premier delete-question"><i
                                class="inline-block fa-solid fa-trash"></i>
                        </span>
                    </div>
                    <label class="block text-sm">
                        <span class="text-gray-700 ">
                            Pertanyaan*
                        </span>
                        <input type="text" name="question[]" class="form-input" placeholder="Pertanyaan" required/>
                    </label>
                    <div class="gap-1 col-span-full option-container">
                        <input type="hidden" name="option_count[]" value="1" class="option_count">
                        <div class="flex items-center w-full option-row gap-x-3">
                            <div class="flex flex-col w-9/12 gap-2 option-list">
                                <input type="text" name="option[]" class="option-item form-input" placeholder="Opsi" required>
                            </div>
                            <div class="flex items-center gap-x-4 option-action">
                                <span class="text-lg cursor-pointer text-emerald-600 add-option"><i
                                        class="inline-block fa-solid fa-circle-plus"></i>
                                </span>
                                <label class="flex items-center text-xs text-blue-900 cursor-pointer sm:text-sm gap-x-1 ">
                                    <input type="radio" name="correct_option_${qt}" class="correct_option" required>
                                    Opsi benar
                                </label>
                            </div>
                        </div>
                    </div>
                </div>`
            }

            const or = (or) => {
                return `<div class="flex items-center w-full option-row gap-x-3">
                    <div class="flex flex-col w-9/12 gap-2 option-list">
                        <input type="text" name="option[]" class="option-item form-input" placeholder="Opsi" required>
                    </div>
                    <div class="flex items-center gap-x-4 option-action">
                        <span class="text-lg cursor-pointer text-emerald-600 add-option"><i
                                class="inline-block fa-solid fa-circle-plus"></i>
                        </span>
                        <span class="text-lg cursor-pointer text-premier delete-option"><i
                                class="inline-block fa-solid fa-trash"></i>
                        </span>
                        <label class="flex items-center text-xs text-blue-900 cursor-pointer sm:text-sm gap-x-1 ">
                            <input type="radio" name="correct_option_${or}" class="correct_option" required>
                            Opsi benar
                        </label>
                    </div>
                </div>`;
            }

            // Add Question
            $(document).on('click', '.add-question', function() {
                let start_correct_option = 0;

                question_total = parseInt(question_total) + 1;
                count_soal.text(question_total);
                $('.question-container').append(qt(question_total));

                $('.correct_option').each(function() {
                    $(this).val(start_correct_option++)
                })
            })

            // Delete Question
            $(document).on('click', '.delete-question', function() {
                let start_correct_option = 0;

                question_total -= parseInt(1)
                count_soal.text(question_total);
                $(this).parent().parent('.question-row').remove()

                $('.correct_option').each(function() {
                    $(this).val(start_correct_option++)
                })
            })

            // Add Option
            $(document).on('click', '.add-option', function() {
                let start_correct_option = 0;

                $(this).parent().parent().siblings('.option_count').val(parseInt($(this).parent().parent()
                    .siblings(
                        '.option_count')
                    .val()) + 1);
                $(this).parent().parent().parent('.option-container').append(or(question_total));

                $('.correct_option').each(function() {
                    $(this).val(start_correct_option++)
                })
            })

            // Delete Option
            $(document).on('click', '.delete-option', function() {
                let start_correct_option = 0;

                $(this).parent().parent().siblings('.option_count').val(parseInt($(this).parent().parent()
                    .siblings(
                        '.option_count')
                    .val()) - 1);
                $(this).parent().parent('.option-row').remove()

                $('.correct_option').each(function() {
                    $(this).val(start_correct_option++)
                })
            })
        });
    </script>
@endsection
