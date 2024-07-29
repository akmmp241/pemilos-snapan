<!DOCTYPE html>
<html class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pilih Kandidat</title>
  @vite('resources/css/app.css')
  <style>
    .vote-input:checked+.vote-card {
      box-shadow: 0 0 1px 5px #3063af;
    }

    body {
      background: linear-gradient(180deg,
          rgba(8, 56, 127, 1) 0%,
          rgba(11, 77, 175, 1) 100%) no-repeat;
    }
  </style>
</head>

<body>
  @if (in_array(auth()->user()->role_id, [App\Models\User::ADMIN, App\Models\User::SUPER_ADMIN]))
    <div class="flex flex-col items-center justify-between gap-4 px-8 py-4 text-white bg-gray-700 sm:flex-row sm:gap-0">
      <div class="flex flex-col text-center sm:text-left">
        <span>Anda adalah <strong>ADMIN</strong></span>
        <span>Anda tidak bisa melakukan vote</span>
      </div>
      <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-blue-700 rounded-lg">Go to Dashboard &nbsp; &rarr;</a>
    </div>
  @endif
  <section class="text-white p-14">
    <div class="flex-auto w-full">
      <h1 class="w-full text-4xl font-bold my-7 sm:w-96">
        Silahkan pilih kandidat jagoan anda!
      </h1>
      <span class="w-96">Ingat kamu hanya dapat memilih satu kali! </span>
    </div>
  </section>
  <img class="w-full h-4 sm:h-24" src="/img/grafis_1.png" alt="" />
  <form class="max-w-full flex flex-col justify-center mx-auto bg-[#f0f5ff]" action="{{ route('submit') }}"
    method="POST">
    @if ($errors->any())
      <div class="relative w-full max-w-sm px-4 py-3 mx-auto my-5 leading-normal text-red-700 bg-red-100 rounded-lg"
        role="alert">
        <ul class="ml-4 list-disc">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @csrf
    @method('POST')
    @foreach ($labels as $label => $candidates)
      <h1 class="font-bold text-4xl my-10 text-center text-[#3063af]">
        Kandidat {{ $label }}
      </h1>

      <div class="flex flex-col flex-wrap gap-8 mb-10 mx-14 sm:flex-row sm:mx-auto">
        @foreach ($candidates as $candidate)
          <div class="flex-auto">
            <label>
              <input type="radio" required name="{{ strtolower($candidate->label) }}" class="hidden vote-input"
                value="{{ $candidate->id }}" />
              <div
                class="flex flex-col items-center max-w-sm overflow-hidden duration-200 bg-white shadow-xl vote-card rounded-xl hover:scale-105 hover:shadow-xl hover:cursor-pointer">
                <div class="scale-75 sm:min-w-[300px] sm:min-h-[300px] mx-6 mt-10">
                  <img src="{{ asset($candidate->image) }}" alt="{{ $candidate->name }}"
                    class="object-cover w-full h-full mx-auto" />
                </div>
                <div class="p-5 text-center">
                  <p class="text-lg font-bold">{{ $candidate->name }}</p>
                  <p class="text-lg font-bold">{{ $candidate->number }}</p>
                </div>
              </div>
            </label>
          </div>
        @endforeach
      </div>
    @endforeach

    <!-- Button -->
    <button type="submit" onclick="return window.confirm('Apakah Anda yakin dengan pilihan ini?')"
      class="flex rounded-3xl px-8 py-4 my-10 w-[90%] mx-auto sm:w-[20%] bg-blue-800 hover:bg-blue-600 dark:text-white">
      <div class="flex items-center justify-between flex-1">
        <span class="text-lg font-medium text-white">Kirim</span>
        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fillRule="evenodd" clipRule="evenodd"
            d="M0 8.71423C0 8.47852 0.094421 8.25246 0.262491 8.08578C0.430562 7.91911 0.658514 7.82547 0.896201 7.82547H13.9388L8.29808 2.23337C8.12979 2.06648 8.03525 1.84013 8.03525 1.60412C8.03525 1.36811 8.12979 1.14176 8.29808 0.974875C8.46636 0.807989 8.6946 0.714233 8.93259 0.714233C9.17057 0.714233 9.39882 0.807989 9.5671 0.974875L16.7367 8.08499C16.8202 8.16755 16.8864 8.26562 16.9316 8.3736C16.9767 8.48158 17 8.59733 17 8.71423C17 8.83114 16.9767 8.94689 16.9316 9.05487C16.8864 9.16284 16.8202 9.26092 16.7367 9.34348L9.5671 16.4536C9.39882 16.6205 9.17057 16.7142 8.93259 16.7142C8.6946 16.7142 8.46636 16.6205 8.29808 16.4536C8.12979 16.2867 8.03525 16.0604 8.03525 15.8243C8.03525 15.5883 8.12979 15.362 8.29808 15.1951L13.9388 9.603H0.896201C0.658514 9.603 0.430562 9.50936 0.262491 9.34268C0.094421 9.17601 0 8.94995 0 8.71423Z"
            fill="white" />
        </svg>
      </div>
    </button>

    <!-- Button -->
  </form>
</body>

</html>
