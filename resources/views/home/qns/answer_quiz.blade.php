@extends('layouts.app')
@section('content')
    <section
        class="flex flex-col items-center w-full h-full min-h-screen gap-4 px-4 py-4 bg-gradient-to-br from-tersier to-kuartener">
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
                @if (strtotime(date('Y-m-d H:i:s')) - strtotime($history->time_start) > $qns->duration * 60 || $history->finish)
                    <span class="block w-full mt-4 mb-2 text-xl font-bold text-center text-slate-600">Quiz Telah
                        Selesai</span>
                    <span class="block w-full font-bold text-center text-slate-600">Hasil Quiz Anda :
                        {{ $correct_count }}/{{ count($qns->question) }}</span>
                    <div
                        class="flex items-center justify-center px-6 py-4 mx-auto my-8 rounded-full bg-premier w-fit aspect-square">
                        <span
                            class="block w-full text-2xl font-bold text-center text-white">{{ number_format(($correct_count / count($qns->question)) * 100, 0, '.', ',') }}
                        </span>
                    </div>
                @else
                    <div class="fixed inset-x-0 px-4 py-2 mx-auto text-xs text-white rounded-full top-1 bg-premier w-fit">
                        <i class="fa-regular fa-clock"></i>
                        <span id="timer"></span>
                    </div>
                    <input type="hidden" id="time-end"
                        value="{{ date('M d, Y H:i:s', strtotime('+' . $qns->duration . ' minutes', strtotime($history->time_start))) }}">
                    <form action="{{ route('qns.store_answer', $qns->id) }}" method="post" id="form-survey">
                        @csrf
                        <input type="hidden" name="qns_id" value="{{ $qns->id }}">
                        <input type="hidden" name="telp" value="{{ $user->telp }}">
                        <input type="hidden" name="user" value="{{ request()->get('user') }}">
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

                                    @default
                                @endswitch

                            </div>
                        @endforeach
                        <button type="submit" id="btn-submit"
                            class="w-full px-6 py-2 my-4 font-semibold text-white rounded bg-premier">Submit</button>
                    </form>
                @endif
            @else
                <div class="flex flex-col items-center justify-center w-full gap-2 my-6 ">
                    <span class="font-bold text-gray-500"><i
                            class="mr-2 fa-solid fa-hourglass-end"></i>{{ $qns->duration }}
                        Menit</span>
                    <a href="{{ route('qns.answer', $qns->id) }}?start=1"
                        class="inline-block px-4 py-2 mx-auto font-bold text-white bg-gray-800 rounded-md">Mulai
                        Quiz
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            // var time_start = $("#time-start").val();
            var time_end = $("#time-end").val();

            // var count_start = new Date(`${time_start}`).getTime();
            var count_end = new Date(`${time_end}`).getTime();
            // Update the count down every 1 second

            var timer = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                // var distance = count_end - now;
                var distance = count_end - now;
                console.log(now, count_end);
                console.log(distance);
                // Time calculations for days, hours, minutes and seconds
                // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                $("#timer").html(minutes + ":" + seconds);

                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(timer);
                    $("#timer").html("Waktu Habis");
                    // $("#form-quiz").submit(function() {
                    //     location.reload();
                    // });
                    $("#btn-submit").click();
                }
            }, 1000);
        })
    </script>
@endsection
