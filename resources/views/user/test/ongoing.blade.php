@extends('layouts.user')

@push('styles')
<style>
    .timer {
        font-family: 'Courier New', monospace;
        font-size: 2.5rem;
    }
    .progress-bar {
        transition: width 0.3s ease;
    }
    .option-btn {
        transition: all 0.2s ease;
        cursor: pointer;
    }
    .option-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .option-btn.selected {
        background-color: #3b82f6 !important;
        border-color: #2563eb !important;
        color: white !important;
    }
    .key-shortcut {
        display: inline-block;
        width: 30px;
        height: 30px;
        border: 2px solid #6b7280;
        border-radius: 6px;
        text-align: center;
        line-height: 26px;
        font-weight: bold;
        margin-right: 10px;
    }
</style>
@endpush

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Header dengan timer -->
            <div class="bg-white shadow rounded-lg mb-6">
                <div class="px-6 py-4 border-b">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">Test Masuk PMB 2026</h2>
                            <p class="text-gray-600 text-sm">Soal {{ $soalTerjawab + 1 }} dari {{ $totalSoal }}</p>
                        </div>

                        <div class="text-center">
                            <div id="timer" class="text-3xl font-bold text-red-600 timer">
                                30:00
                            </div>
                            <div class="text-sm text-gray-500">Sisa Waktu</div>
                        </div>

                        <div>
                            <div class="text-right">
                                <div class="font-bold">{{ auth()->user()->name }}</div>
                                <div class="text-sm text-gray-500">{{ auth()->user()->calonMaba->nomor_test ?? 'TEST-' . auth()->id() }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress bar -->
                <div class="px-6 py-2">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div id="progress-bar" class="bg-blue-600 h-2.5 rounded-full progress-bar"
                             style="width: {{ (($soalTerjawab + 1) / $totalSoal) * 100 }}%"></div>
                    </div>
                </div>
            </div>

            <!-- Soal -->
            <div class="bg-white shadow rounded-lg p-8">
                <div class="mb-8">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Soal:</h3>
                    <div class="text-gray-700 text-lg leading-relaxed bg-gray-50 p-6 rounded-lg min-h-[120px]">
                        {{ $soal->pertanyaan }}
                    </div>
                </div>

                <!-- Pilihan Jawaban -->
                <div class="space-y-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Pilih Jawaban:</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="options-container">
                        @foreach(['a', 'b', 'c', 'd', 'e'] as $index => $option)
                            @if($soal->{'pilihan_' . $option})
                                <div class="option-btn bg-gray-50 hover:bg-blue-50 border-2 border-gray-200 rounded-lg p-6 text-left transition duration-200"
                                    data-option="{{ $option }}"
                                    onclick="selectOption('{{ $option }}')">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xl mr-4">
                                            {{ strtoupper($option) }}
                                        </div>
                                        <div class="text-gray-700 text-lg">
                                            {{ $soal->{'pilihan_' . $option} }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Tombol Submit -->
                    <div class="mt-8 text-center">
                        <button id="submit-btn"
                                onclick="submitAnswer()"
                                disabled
                                class="bg-gray-400 text-white font-bold py-3 px-10 rounded-lg text-lg transition duration-300 opacity-50 cursor-not-allowed">
                            <i class="fas fa-paper-plane mr-2"></i> Kirim Jawaban
                        </button>
                        <p id="submit-hint" class="text-sm text-gray-500 mt-2">Pilih salah satu jawaban terlebih dahulu</p>
                    </div>
                </div>

                <!-- Shortcut info -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-500 text-center">
                        <strong>Tips:</strong> Gunakan keyboard
                        @foreach(['1', '2', '3', '4', '5'] as $key)
                            <span class="key-shortcut">{{ $key }}</span>
                        @endforeach
                        untuk memilih jawaban A-E
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading overlay -->
    <div id="loading-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-xl text-center">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto mb-4"></div>
            <p class="text-gray-700 font-bold">Mengirim jawaban...</p>
        </div>
    </div>

    @push('scripts')
    <script>
        // ==================== VARIABLES ====================
        let waktuSisa = {{ $sisaWaktu }};
        let soalTerjawab = {{ $soalTerjawab }};
        let totalSoal = {{ $totalSoal }};
        let selectedOption = null;
        let timerInterval = null;

        // ==================== TIMER FUNCTIONS ====================
        function updateTimer() {
            if (waktuSisa <= 0) {
                clearInterval(timerInterval);
                document.getElementById('timer').textContent = "00:00";
                document.getElementById('timer').classList.add('text-red-600');
                autoSubmitOnTimeout();
                return;
            }

            waktuSisa--;

            const minutes = Math.round(waktuSisa / 60);
            const seconds =Math.round(waktuSisa % 60);

            const timerElement = document.getElementById('timer');
            timerElement.textContent =
                `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

            // Change color when time is running low
            if (waktuSisa < 300) { // 5 minutes
                timerElement.classList.remove('text-red-600');
                timerElement.classList.add('text-red-500');
            }
            if (waktuSisa < 60) { // 1 minute
                timerElement.classList.remove('text-red-500');
                timerElement.classList.add('text-red-700');
            }

            // Update progress bar
            const progressPercent = ((soalTerjawab + 1) / totalSoal) * 100;
            document.getElementById('progress-bar').style.width = `${progressPercent}%`;
        }

        function autoSubmitOnTimeout() {
            if (selectedOption) {
                submitAnswer();
            } else {
                // If no answer selected, submit empty answer
                fetch('{{ route("user.test.timeout", $testSession->token) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (response.redirected) {
                        window.location.href = response.url;
                    } else {
                        return response.json().then(data => {
                            window.location.href = data.redirect || '{{ route("user.test.hasil") }}';
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    window.location.href = '{{ route("user.test.hasil") }}';
                });
            }
        }

        // ==================== ANSWER SELECTION ====================
        function selectOption(option) {
            // Remove selected class from all options
            document.querySelectorAll('.option-btn').forEach(btn => {
                btn.classList.remove('selected');
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-50', 'text-gray-700');
            });

            // Add selected class to clicked option
            const selectedBtn = document.querySelector(`[data-option="${option}"]`);
            selectedBtn.classList.add('selected', 'bg-blue-600', 'text-white');
            selectedBtn.classList.remove('bg-gray-50', 'text-gray-700');

            // Update selected option
            selectedOption = option;

            // Enable submit button
            const submitBtn = document.getElementById('submit-btn');
            const submitHint = document.getElementById('submit-hint');
            submitBtn.disabled = false;
            submitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed', 'opacity-50');
            submitBtn.classList.add('bg-green-600', 'hover:bg-green-700', 'cursor-pointer', 'opacity-100');
            submitHint.textContent = `Jawaban ${option.toUpperCase()} terpilih. Klik kirim atau tekan Enter.`;
        }

        // ==================== SUBMIT ANSWER ====================
        function submitAnswer() {
            if (!selectedOption) {
                document.getElementById('submit-hint').textContent = 'Pilih jawaban terlebih dahulu!';
                return;
            }

            // Show loading overlay
            document.getElementById('loading-overlay').classList.remove('hidden');

            // Prepare form data
            const formData = new FormData();
            formData.append('soal_id', {{ $soal->id }});
            formData.append('jawaban', selectedOption);
            formData.append('waktu_jawab', waktuSisa);
            formData.append('_token', '{{ csrf_token() }}');

            // Submit answer
            fetch('{{ route("user.test.submit", $testSession->token) }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if  (data.success) {
                    // Clear timer interval
                    if (timerInterval) {
                        clearInterval(timerInterval);
                    }

                    // Redirect to next question or result
                    setTimeout(() => {
                        window.location.href = data.next_url || '{{ route("user.test.ongoing", ["token" => $testSession->token]) }}';
                    }, 500);
                } else {
                    throw new Error(data.message || 'Unknown error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('loading-overlay').classList.add('hidden');
                alert('Terjadi kesalahan saat mengirim jawaban. Silakan coba lagi.');
            });
        }

        // ==================== KEYBOARD SHORTCUTS ====================
        document.addEventListener('keydown', (e) => {
            // Number keys 1-5 for options A-E
            if (e.key >= '1' && e.key <= '5') {
                const option = String.fromCharCode(96 + parseInt(e.key)); // Convert 1->a, 2->b, etc.
                if (document.querySelector(`[data-option="${option}"]`)) {
                    selectOption(option);
                }
            }

            // Enter key to submit
            if (e.key === 'Enter' && selectedOption) {
                e.preventDefault();
                submitAnswer();
            }

            // Space key to select
            if (e.key === ' ' && !selectedOption) {
                e.preventDefault();
                const firstOption = document.querySelector('[data-option]');
                if (firstOption) {
                    selectOption(firstOption.dataset.option);
                }
            }
        });

        // ==================== INITIALIZE ====================
        document.addEventListener('DOMContentLoaded', function() {
            // Start timer
            timerInterval = setInterval(updateTimer, 1000);

            // Auto-submit when time is up
            setTimeout(() => {
                if (timerInterval) {
                    clearInterval(timerInterval);
                }
                autoSubmitOnTimeout();
            }, waktuSisa * 1000);

            // Update timer immediately
            updateTimer();

            // Focus on options container for keyboard navigation
            document.getElementById('options-container').focus();

            // Add tooltip to options
            document.querySelectorAll('.option-btn').forEach((btn, index) => {
                btn.title = `Tekan ${index + 1} di keyboard untuk memilih`;
            });
        });
    </script>
    @endpush
