@extends('admin.layouts.main')

@section('title')
  <title>List Kandidat</title>
@endsection

@section('content')
  <div class="flex justify-between">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Kandidat
    </h2>

    <a href="{{ route('admin.candidates.create') }}"
      class="mt-6 h-fit text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tambah</a>
  </div>

  <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
    @if (session()->has('success'))
      <div id="toast-success"
        class="flex items-center p-4 mb-4 w-full text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
        role="alert">
        <div
          class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
              clip-rule="evenodd"></path>
          </svg>
        </div>
        <span class="ml-5 text-sm font-normal">{{ session()->get('success') }}</span>
      </div>
    @endif

    @foreach ($labels as $label => $candidates)
      <h4 class="mt-10 text-2xl font-semibold text-gray-600 dark:text-gray-300">{{ $label }}</h4>
      <div class="flex flex-wrap justify-center flex-col md:flex-row gap-8 mt-5">
        @foreach ($candidates as $candidate)
          <div class="w-full md:w-[45%] p-4 text-center bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="flex justify-end mb-2">
              <a href="{{ route('admin.candidates.edit', ['candidate' => $candidate->id]) }}"
                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                aria-label="Edit">
                 <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                  </path>
                </svg>
              </a>
              <form action="{{ route('admin.candidates.destroy', ['candidate' => $candidate->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" onclick="return window.confirm('Anda yakin ingin menghapus kandidat ini?')"
                  class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                  aria-label="Delete">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </form>
            </div>
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">{{ $candidate->name }}</h4>
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">{{ $candidate->number }}</h4>
            <img class="mx-auto h-[300px] w-[300px] object-cover rounded-md"
              src="{{ asset($candidate->image) }}" alt="{{ $candidate->name }}">
          </div>
        @endforeach
      </div>
    @endforeach
  </div>
@endsection
