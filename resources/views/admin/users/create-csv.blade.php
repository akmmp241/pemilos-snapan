@extends('admin.layouts.main')

@section('title')
  <title>Tambah User</title>
@endsection

@extends('admin.layouts.main')

@section('title')
  <title>Tambah User</title>
@endsection

@section('content')
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Tambah User Dengan File (CSV)
  </h2>

  <form x-data="{ isStudentRadio: {{ old('role_id' !== App\Models\User::STUDENT) ? 'false' : 'true' }} }"
        action="{{ route('admin.users.csv') }}" method="POST" enctype="multipart/form-data"
        class="p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf

    <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">File</label>
    <input required
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
      name="csv-file" type="file" id="csv-file">
    @error('csv-file')
    <span class="text-xs text-red-600 dark:text-red-400">
        {{ $message }}
      </span>
    @enderror

    <button type="submit" onclick="return window.confirm('Yakin ingin menambah dengan file ini')"
            class="mt-6 mr-4 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
      Submit
    </button>

    <a href="{{ route('admin.users.index') }}"
       class="mt-6 text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Kembali</a>
  </form>
@endsection

