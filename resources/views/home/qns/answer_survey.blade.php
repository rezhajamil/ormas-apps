@extends('layouts.app')
@section('content')
    <section
        class="flex flex-col items-center w-full h-full min-h-screen gap-4 px-4 py-4 bg-gradient-to-tr from-premier to-sekunder">
        <a href="{{ route('home.index') }}"
            class="px-3 py-2 mr-auto text-sm font-semibold text-white transition-all bg-gray-500 rounded-md hover:bg-gray-600"><i
                class="fa-solid fa-home"></i>
            Home
        </a>
        <div class="w-full px-4 py-2 bg-white rounded-lg shadow-xl h-fit sm:w-3/4 ">
            <span class="block w-full py-2 mb-2 text-2xl font-bold text-center border-b-2 text-sekunder">
                {{ ucwords($qns->name) }}
            </span>
            @if ($history)
                <span class="block w-full mt-4 mb-2 text-xl font-bold text-center text-gray-600">
                    <i class="text-xl fa-regular fa-face-laugh-beam"></i>
                </span>
                <span class="block w-full mt-4 mb-2 text-xl font-bold text-center text-gray-600">
                    Terimakasih sudah mengisi survey
                </span>
            @else
                <form action="{{ route('qns.store_answer', $qns->id) }}" method="post" id="form-survey">
                    @csrf
                    <input type="hidden" name="qns_id" value="{{ $qns->id }}">
                    <input type="hidden" name="id_digipos" value="{{ $user->id_digipos }}">
                    <input type="hidden" name="user" value="{{ request()->get('user') }}">
                    <input type="hidden" name="telp" value="{{ $user->telp }}">
                    @foreach ($qns->question as $i_question => $question)
                        <div class="flex flex-col py-4 border-b-4 gap-y-3">
                            <span class="font-semibold">{{ $i_question + 1 }}) {{ $question->text }}</span>
                            @switch($question->type)
                                @case('pilgan')
                                    @foreach ($question->option as $i_option => $option)
                                        <label>
                                            <input type="radio" name="selected_option_{{ $i_question }}"
                                                value="{{ $option->id }}" class="hidden peer">
                                            <div
                                                class="flex w-full font-semibold border-2 rounded peer-checked:text-white peer-checked:bg-green-600 peer-checked:border-green-800">
                                                <span class="inline-block w-full p-4">{{ $option->text }}</span>
                                            </div>
                                        </label>
                                    @endforeach
                                @break

                                @case('pilgan_isian')
                                    @foreach ($question->option as $i_option => $option)
                                        <label>
                                            <input type="radio" name="selected_option_{{ $i_question }}"
                                                value="{{ $option->id }}" class="hidden peer other_option">
                                            <div
                                                class="flex w-full font-semibold border-2 rounded peer-checked:text-white peer-checked:bg-green-600 peer-checked:border-green-800">
                                                <span class="inline-block w-full p-4">{{ $option->text }}</span>
                                            </div>
                                        </label>
                                    @endforeach
                                    <label>
                                        <input type="radio" name="selected_option_{{ $i_question }}"
                                            class="hidden peer other_option other" value="">
                                        <div
                                            class="flex w-full font-semibold border-2 rounded peer-checked:text-white peer-checked:bg-green-600 peer-checked:border-green-800">
                                            <span class="inline-block w-full p-4">Lainnya</span>
                                        </div>
                                    </label>
                                    <label class="other_label">
                                        <input type="text" name="other_text_{{ $i_question }}" disabled required
                                            placeholder="Jawaban Lainnya"
                                            class="flex w-full font-semibold bg-white border-2 other_text placeholder:opacity-70 disabled:placeholder:text-gray-400 placeholder:text-sm disabled:bg-gray-300/70">
                                    </label>
                                @break

                                @case('kotak_centang')
                                    <div class="flex flex-col checkbox_group gap-y-3">
                                        @foreach ($question->option as $i_option => $option)
                                            <label>
                                                <input type="checkbox" name="selected_option_{{ $i_question }}[]"
                                                    value="{{ $option->id }}" class="hidden peer">
                                                <div
                                                    class="flex w-full font-semibold border-2 rounded peer-checked:text-white peer-checked:bg-green-600 peer-checked:border-green-800">
                                                    <span class="inline-block w-full p-4">{{ $option->text }}</span>
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                @break

                                @case('isian')
                                    <input type="hidden" name="selected_option_{{ $i_question }}" value="">
                                    <label>
                                        <input type="text" name="other_text_{{ $i_question }}" required
                                            placeholder="Isi Jawaban Anda"
                                            class="flex w-full font-semibold bg-white border-2 placeholder:opacity-70 placeholder:text-sm disabled:bg-gray-500">
                                    </label>
                                @break

                                @default
                            @endswitch

                        </div>
                    @endforeach
                    <button type="submit" id="btn-submit"
                        class="w-full px-6 py-2 my-4 font-semibold text-white bg-gray-800 rounded">Selesai</button>
                </form>
            @endif
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.other_option').change(function() {
                let checked = $(this).hasClass('other');
                // console.log($(this).parent().siblings('.other_label').find('.other_text'));

                if (checked) {
                    $(this).parent().siblings('.other_label').find('.other_text').prop('disabled', (i, v) =>
                        v = false);
                } else {
                    $(this).parent().siblings('.other_label').find('.other_text').prop('disabled', (i, v) =>
                        v = true);
                }
            })

            $("#form-survey").submit(function(e) {
                $(".checkbox_group").each(function() {
                    if ($(this).find("input[type='checkbox']:checked").length === 0) {
                        e.preventDefault()
                        alert('Mohon jawab semua pertanyaan');
                    }

                })
            })
        })
    </script>
@endsection
