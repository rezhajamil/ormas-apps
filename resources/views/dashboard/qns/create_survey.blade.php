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
            Buat Survey
        </h4>
        <form action="{{ route('qns.store') }}" method="post" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            @csrf
            <input type="hidden" name="type" value="survey">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
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
                <div class="grid grid-cols-1 gap-2 p-3 bg-gray-100 rounded-md sm:grid-cols-2 question-row">
                    <div class="flex ml-auto col-span-full gap-x-4 question-action">
                        <span class="text-lg cursor-pointer text-emerald-600 aspect-square add-question"><i
                                class="inline-block fa-solid fa-circle-plus"></i>
                        </span>
                    </div>
                    <label class="block text-sm">
                        <span class="text-gray-700 ">
                            Pertanyaan*
                        </span>
                        <input type="text" name="question[]" class="form-input" placeholder="Pertanyaan" required />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 ">
                            Jenis Pertanyaan*
                        </span>
                        <select name="question_type[]" class="form-input select-type" required>
                            <option value="" disabled>Pilih Jenis Pertanyaan</option>
                            <option value="pilgan">Pilihan Ganda</option>
                            <option value="isian">Isian</option>
                            <option value="pilgan_isian">Pilihan Ganda & Isian</option>
                            <option value="kotak_centang">Kotak Centang</option>
                        </select>
                    </label>
                    <div class="gap-1 col-span-full option-container">
                        <input type="hidden" name="option_count[]" value="1" class="option_count">
                        <div class="flex items-center w-full option-row gap-x-3">
                            <div class="flex flex-col w-10/12 gap-2 option-list">
                                <input type="text" name="option[]" class="option-item form-input" placeholder="Opsi"
                                    required>
                            </div>
                            <div class="flex w-2/12 gap-x-4 option-action">
                                <span class="text-lg cursor-pointer text-emerald-600 aspect-square add-option"><i
                                        class="inline-block fa-solid fa-circle-plus"></i>
                                </span>
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
            // let question_template = $(".question-row").first();
            let count_soal = $("#count-soal");

            let question_template = `<div
                    class="grid grid-cols-1 gap-2 p-3 bg-gray-100 rounded-md sm:grid-cols-2 question-row">
                    <div class="flex ml-auto col-span-full gap-x-4 question-action">
                        <span class="text-lg cursor-pointer text-emerald-600 aspect-square add-question"><i
                                class="inline-block fa-solid fa-circle-plus"></i>
                        </span>
                        <span class="text-lg cursor-pointer text-premier aspect-square delete-question"><i
                                class="inline-block fa-solid fa-trash"></i>
                        </span>
                    </div>
                    <label class="block text-sm">
                        <span class="text-gray-700 ">
                            Pertanyaan*
                        </span>
                        <input type="text" name="question[]" class="form-input" placeholder="Pertanyaan" required/>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 ">
                            Jenis Pertanyaan*
                        </span>
                        <select name="question_type[]" class="form-input select-type" required>
                            <option value="" disabled>Pilih Jenis Pertanyaan</option>
                            <option value="pilgan">Pilihan Ganda</option>
                            <option value="isian">Isian</option>
                            <option value="pilgan_isian">Pilihan Ganda & Isian</option>
                            <option value="kotak_centang">Kotak Centang</option>
                        </select>
                    </label>
                    <div class="gap-1 col-span-full option-container">
                        <input type="hidden" name="option_count[]" value="1" class="option_count">
                        <div class="flex items-center w-full option-row gap-x-3">
                            <div class="flex flex-col w-10/12 gap-2 option-list">
                                <input type="text" name="option[]" class="option-item form-input" placeholder="Opsi" required>
                            </div>
                            <div class="flex w-2/12 gap-x-4 option-action">
                                <span class="text-lg cursor-pointer text-emerald-600 aspect-square add-option"><i
                                        class="inline-block fa-solid fa-circle-plus"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>`;

            let option_row =
                `<div class="flex items-center w-full option-row gap-x-3">
                    <div class="flex flex-col w-10/12 gap-2 option-list">
                        <input type="text" name="option[]" class="option-item form-input" placeholder="Opsi" required>
                    </div>
                    <div class="flex w-2/12 gap-x-4 option-action">
                        <span class="text-lg cursor-pointer text-emerald-600 aspect-square add-option"><i
                                class="inline-block fa-solid fa-circle-plus"></i>
                        </span>
                        <span class="text-lg cursor-pointer text-premier aspect-square delete-option"><i
                                class="inline-block fa-solid fa-trash"></i>
                        </span>
                    </div>
                </div>`;

            let option_row_first =
                `
                <input type="hidden" name="option_count[]" value="1" class="option_count">
                <div class="flex items-center w-full option-row gap-x-3">
                    <div class="flex flex-col w-10/12 gap-2 option-list">
                        <input type="text" name="option[]" class="option-item form-input" placeholder="Opsi" required>
                    </div>
                    <div class="flex w-2/12 gap-x-4 option-action">
                        <span class="text-lg cursor-pointer text-emerald-600 aspect-square add-option"><i
                                class="inline-block fa-solid fa-circle-plus"></i>
                        </span>
                    </div>
                </div>`

            let option_isian =
                `
                <input type="hidden" name="option_count[]" value="1" class="option_count">
                <input type="hidden" name="option[]">`

            // Add Question
            $(document).on('click', '.add-question', function() {
                count_soal.text(parseInt(count_soal.text()) + 1);
                $('.question-container').append(question_template)
            })

            // Delete Question
            $(document).on('click', '.delete-question', function() {
                count_soal.text(parseInt(count_soal.text()) - 1);
                $(this).parent().parent('.question-row').remove()
            })

            // Add Option
            $(document).on('click', '.add-option', function() {
                $(this).parent().parent().siblings('.option_count').val(parseInt($(this).parent().parent()
                    .siblings(
                        '.option_count')
                    .val()) + 1);
                $(this).parent().parent().parent('.option-container').append(option_row)
            })

            // Delete Option
            $(document).on('click', '.delete-option', function() {
                $(this).parent().parent().siblings('.option_count').val(parseInt($(this).parent().parent()
                    .siblings(
                        '.option_count')
                    .val()) - 1);
                $(this).parent().parent('.option-row').remove()
            })

            //Select Type
            $(document).on('input', '.select-type', function() {
                if ($(this).val() == 'isian') {
                    $(this).parent().siblings('.option-container').html(option_isian)
                } else {
                    $(this).parent().siblings('.option-container').html(option_row_first)
                }
            })
        });
    </script>
@endsection
