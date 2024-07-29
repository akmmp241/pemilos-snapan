<!DOCTYPE html>
<html class="scroll-smooth">

<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>E-Voting SMK Negeri 8 Semarang</title>
  @vite('resources/css/app.css')
  @vite('resources/js/main.ts')
  @livewireStyles
</head>

<body>
@if (in_array(auth()->user()->role_id, [App\Models\User::ADMIN, App\Models\User::SUPER_ADMIN]))
  <div class="flex flex-col items-center justify-between gap-4 px-8 py-4 text-white bg-gray-700 sm:flex-row sm:gap-0">
    <span>Anda adalah <strong>ADMIN</strong></span>
    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-blue-700 rounded-lg">Go to Dashboard &nbsp; &rarr;</a>
  </div>
@endif
<!-- Section 1# -->
<main class="justify-center z-[99] px-8 scroll-smooth">
  <div class="flex items-center justify-center w-full min-h-screen mx-auto">
    <img class="h-72 absolute -z-[99] opacity-[0.25] md:hidden mx-auto left-16 sm:mx-0"
         src="/img/maskot_pemilos_2023.png" alt=""/>
    <div class="flex flex-wrap">
      <div class="flex-auto w-2/6 p-12">
        <img class="max-w-[300px]" src="/img/logo.png" alt="" srcset=""/>

        <div class="w-full mt-16 space-y-6">
          <h1 class="text-[38px] leading-10 font-extrabold">
            SASTRA PRABU
          </h1>
          <section class="flex flex-row items-center h-full">
            <div class="w-1 mr-4 bg-gray-300 h-14"></div>
            <p class="italic after:content-['”'] before:content-['“']">Saatnya Satu Suara Untuk Pemimpin Organisasi
              Intra Yang Baru</p>
          </section>
          <p>
            Ayo, jangan lewatkan kesempatan ini untuk berkontribusi. Pilihanmu adalah langkah awal
            menuju masa depan yang lebih baik untuk SMK Negeri 8 Semarang. Suara Anda memiliki dampak
            besar, dan bersama-sama kita dapat menciptakan perubahan yang berarti.
          </p>
          <button onclick="location.href='#introduction';"
                  class="block uppercase rounded-[28px] shadow bg-blue-800 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white text-base font-bold py-4 px-12">
            Ayo Mulai!
          </button>
        </div>
      </div>
      <div class="flex-auto hidden w-2/12 md:flex">
        <img class="ml-auto h-[85%]" src="/img/maskot_pemilos_2023.png" alt=""/>
      </div>
    </div>
  </div>
</main>
<!-- End Section 1# -->

<section id="introduction" class="w-full max-w-5xl px-8 mx-auto md:py-0">
  <div class="flex flex-col flew-wrap sm:flex-row">
    <div class="flex-auto w-full p-7 sm:w-3/4">
      <livewire:styles/>
        <livewire:hover-candidates :imageSrc="'/img/Bersama formal.webp'" :imageChange="'/img/Bersama non formal.webp'"/>
      <livewire:scripts/>
    </div>

    <div class="self-center flex-auto p-4 sm:p-0">
      <h4 class="text-[30px] text-center sm:text-start font-extrabold">Ayo kenalan dulu!</h4>
      <div class="flex self-center gap-5">
        <span class="h-12 bg-blue-700 p-[1.5px] rounded-3xl self-center"></span>
        <p>
          Untuk memilih calon ketua OSIS dan paslon ketua & wakil MPK, kamu
          bisa terus gulir halaman ini kebawah
        </p>
      </div>
    </div>
  </div>
  <div class="grid mt-8 sm:grid-cols-2 sm:gap-x-8">
    <section class="flex flex-col items-center p-5">
      <h1 class="text-[30px] font-extrabold mb-4">MPK</h1>
      <livewire:styles/>
        <livewire:hover-candidates :imageSrc="'/img/pemilos2023/MPK formal.webp'"
                                 :imageChange="'/img/pemilos2023/MPK non formal.webp'"/>
      <livewire:scripts/>
    </section>
    <section class="flex flex-col items-center p-5">
      <h1 class="text-[30px] font-extrabold mb-4">OSIS</h1>
      <livewire:styles/>
      <livewire:hover-candidates :imageSrc="'/img/pemilos2023/OSIS non formal.webp'"
                                 :imageChange="'/img/pemilos2023/OSIS formal.webp'"/>
      <livewire:scripts/>
    </section>
  </div>
</section>

<img class="w-full h-24 mt-24" src="/img/grafis_1.png" alt=""/>
<!-- Osis Section -->
<section class="w-full bg-[#f0f5ff] mb-0 px-8 md:py-0">
  <div class="max-w-5xl mx-auto w-full p-4 sm:w-[1024px]">
    <h1 class="text-3xl text-[#3063af] font-bold sm:text-4xl text-center">
      Calon Ketua OSIS
    </h1>
  </div>

  <!-- Caketos 1 -->
  <div class="max-w-5xl my-1 mx-auto w-full sm:my-16 sm:w-[1024px]">
    <div class="flex flex-col flex-wrap p-4 sm:flex-row gap-11">
      <div class="flex-auto">
        <!--  w-52 sm:w-[5%] -->
        <livewire:styles/>
        <livewire:hover-candidates :imageSrc="'/img/pemilos2023/Paslon 01 OSIS formal.webp'"
                                   :imageChange="'/img/pemilos2023/Paslon 01 OSIS non formal.webp'"
                                   :class="'h-auto max-w-full mx-auto w-52 sm:w-72'"/>
        <livewire:scripts/>
      </div>
      <section class="flex-auto text-slate-800 w-full sm:w-[45%]">
        <div class="mb-8 space-y-1">
          <h1 class="text-sm font-semibold text-[#3063af] text-center sm:text-start">Caketos 1</h1>
          <h2 class="text-3xl font-bold text-center sm:text-start">Maulida Nina Annastasya</h2>
          <h1 class="text-sm text-center sm:text-start">Terdepan dalam aksi,
            Pilih nomor 1 untuk OSIS yang lebih berprestasi</h1>
        </div>

        <div class="flex flex-col flex-wrap sm:flex-row">
          <div class="flex-auto w-full text-sm ">
            <p class="font-semibold text-[#3063af] my-4 ">Visi</p>
            <p id="#visiCaketos1" class="text-justify">
              <!-- Injected By Javascript -->
            </p>
          </div>
          <!-- List -->
          <div id="#misiCaketos1" class="flex flex-col w-full text-sm ">
            <p class="font-semibold text-[#3063af] mt-4">Misi</p>
            <!-- Injected By Javascript -->
          </div>
          <!-- List -->
          <div id="#prokerCaketos1" class="flex flex-col w-full text-sm ">
            <p class="font-semibold text-[#3063af] mt-4">Program Kerja</p>
            <!-- Injected By Javascript -->
          </div>
        </div>
      </section>
    </div>
    <div class="block rounded-3xl bg-[#3063af] text-red-500 w-32 h-1 mx-auto my-20"></div>
  </div>
  <!-- Caketos 2 -->
  <div class="max-w-5xl my-1 mx-auto w-full sm:my-16 sm:w-[1024px]">
    <div class="flex flex-col flex-wrap p-4 sm:flex-row gap-11">
      <div class="flex-auto order-first sm:order-last">
        <!--  w-52 sm:w-[5%] -->
        <livewire:styles/>
        <livewire:hover-candidates :imageSrc="'/img/pemilos2023/Paslon 02 OSIS formal.webp'"
                                   :imageChange="'/img/pemilos2023/Paslon 02 OSIS non formal.webp'"
                                   :class="'h-auto max-w-full mx-auto w-52 sm:w-72'"/>
        <livewire:scripts/>
      </div>
      <section class="flex-auto text-slate-800 w-full sm:w-[45%]">
        <div class="mb-8 space-y-1">
          <h1 class="text-sm font-semibold text-[#3063af] text-center sm:text-start">Caketos 2</h1>
          <h2 class="text-3xl font-bold text-center sm:text-start">Muhammad Iman Nur Fallah</h2>
          <h1 class="text-sm text-center sm:text-start">Belajar, Bergerak, Bermakna, bersama dua</h1>
        </div>

        <div class="flex flex-col flex-wrap sm:flex-row">
          <div class="flex-auto w-full text-sm ">
            <p class="font-semibold text-[#3063af] my-4">Visi</p>
            <p id="#visiCaketos2" class="text-justify">
              <!-- Injected By Javascript -->
            </p>
          </div>
          <!-- List -->
          <div id="#misiCaketos2" class="flex flex-col w-full text-sm">
            <p class="font-semibold text-[#3063af] mt-4">Misi</p>
            <!-- Injected By Javascript -->
          </div>
          <!-- List -->
          <div id="#prokerCaketos2" class="flex flex-col w-full text-sm">
            <p class="font-semibold text-[#3063af] mt-4">Program Kerja</p>
            <!-- Injected By Javascript -->
          </div>
        </div>
      </section>
    </div>
    <div class="block rounded-3xl bg-[#3063af] text-red-500 w-32 h-1 mx-auto my-20"></div>
  </div>
  <!-- Caketos 3 -->
  <div class="max-w-5xl my-1 mx-auto w-full sm:my-16 sm:w-[1024px]">
    <div class="flex flex-col flex-wrap p-4 sm:flex-row gap-11">
      <div class="flex-auto">
        <!--  w-52 sm:w-[5%] -->
        <livewire:styles/>
        <livewire:hover-candidates :imageSrc="'/img/pemilos2023/Paslon 03 OSIS formal.webp'"
                                   :imageChange="'/img/pemilos2023/Paslon 03 OSIS non formal.webp'"
                                   :class="'h-auto max-w-full mx-auto w-52 sm:w-72'"/>
        <livewire:scripts/>
      </div>
      <section class="flex-auto text-slate-800 w-full sm:w-[45%]">
        <div class="mb-8 space-y-1">
          <h1 class="text-sm font-semibold text-[#3063af] text-center sm:text-start">Caketos 3</h1>
          <h2 class="text-3xl font-bold text-center sm:text-start">Reyhan Satria Putra S.</h2>
          <h1 class="text-sm text-center sm:text-start">Suara Kita, Aksi Kita, Masa Depan Kita!</h1>
        </div>

        <div class="flex flex-col flex-wrap sm:flex-row">
          <div class="flex-auto w-full text-sm ">
            <p class="font-semibold text-[#3063af] my-4">Visi</p>
            <p id="#visiCaketos3" class="text-justify">
              <!-- Injected By Javascript -->
            </p>
          </div>
          <!-- List -->
          <div id="#misiCaketos3" class="flex flex-col w-full text-sm">
            <p class="font-semibold text-[#3063af] mt-4">Misi</p>
            <!-- Injected By Javascript -->
          </div>
          <!-- List -->
          <div id="#prokerCaketos3" class="flex flex-col w-full text-sm">
            <p class="font-semibold text-[#3063af] mt-4">Program Kerja</p>
            <!-- Injected By Javascript -->
          </div>
        </div>
      </section>
    </div>
    <div class="block rounded-3xl bg-[#3063af] text-red-500 w-32 h-1 mx-auto my-20"></div>
  </div>
  <!-- #CALOND -->
  <img class="w-full h-4 sm:h-24" src="/img/grafis_4.png" alt=""/>
</section>
<img class="w-full h-24" src="/img/grafis_4.png" alt=""/>

<img class="w-full h-24 mt-24" src="/img/grafis_3_yellow.png" alt=""/>
<!-- MPK Section -->
<section class="w-full bg-[#fffbe0] mb-0 px-8 md:py-0">
  <div class="max-w-5xl mx-auto w-full p-4 sm:w-[1024px]">
    <h1 class="text-3xl text-[#3063af] font-bold sm:text-4xl text-center">
      Calon Ketua MPK
    </h1>
  </div>

  <!-- Calon 1 -->
  <div class="max-w-5xl my-1 mx-auto w-full sm:my-16 sm:w-[1024px]">
    <div class="flex flex-col flex-wrap p-4 sm:flex-row gap-11">
      <div class="flex-auto">
        <!--  w-52 sm:w-[5%] -->
        <livewire:styles/>
        <livewire:hover-candidates :imageSrc="'/img/pemilos2023/Paslon 01 MPK formal.webp'"
                                   :imageChange="'/img/pemilos2023/Paslon 01 MPK non formal.webp'"
                                   :class="'h-auto max-w-full mx-auto w-52 sm:w-72'"/>
        <livewire:scripts/>
      </div>
      <section class="flex-auto text-slate-800 w-full sm:w-[45%]">
        <div class="mb-8 space-y-1">
          <h1 class="text-sm font-semibold text-[#3063af] text-center sm:text-start">Calon 1</h1>
          <h2 class="text-3xl font-bold text-center sm:text-start">Alyca Zahrotul Musyitha</h2>
          <h1 class="text-sm text-center sm:text-start">Membangun kerja sama yang sehat, jadikan MPK SNAPAN lebih kuat
            bersama nomor satu</h1>
        </div>

        <div class="flex flex-col flex-wrap sm:flex-row">
          <div class="flex-auto w-full text-sm ">
            <p class="font-semibold text-[#3063af] my-4 ">Visi</p>
            <p id="#visiCakeMpk1" class="text-justify">
              <!-- Injected By Javascript -->
            </p>
          </div>
          <!-- List -->
          <div id="#misiCakeMpk1" class="flex flex-col w-full text-sm ">
            <p class="font-semibold text-[#3063af] mt-4">Misi</p>
            <!-- Injected By Javascript -->
          </div>
          <!-- List -->
          <div id="#prokerCakeMpk1" class="flex flex-col w-full text-sm ">
            <p class="font-semibold text-[#3063af] mt-4">Program Kerja</p>
            <!-- Injected By Javascript -->
          </div>
        </div>
      </section>
    </div>
    <div class="block rounded-3xl bg-[#3063af] text-red-500 w-32 h-1 mx-auto my-20"></div>
  </div>

  <!-- Calon 2 -->
  <div class="max-w-5xl my-1 mx-auto w-full sm:my-16 sm:w-[1024px]">
    <div class="flex flex-col flex-wrap p-4 sm:flex-row gap-11">
      <div class="flex-auto sm:order-last">
        <!--  w-52 sm:w-[5%] -->
        <livewire:styles/>
        <livewire:hover-candidates :imageSrc="'/img/pemilos2023/Paslon 02 MPK formal.webp'"
                                   :imageChange="'/img/pemilos2023/Paslon 02 MPK non formal.webp'"
                                   :class="'h-auto max-w-full mx-auto w-52 sm:w-72'"/>
        <livewire:scripts/>
      </div>
      <section class="flex-auto text-slate-800 w-full sm:w-[45%]">
        <div class="mb-8 space-y-1">
          <h1 class="text-sm font-semibold text-[#3063af] text-center sm:text-start">Calon 2</h1>
          <h2 class="text-3xl font-bold text-center sm:text-start">Aqila Zahra Nur Hidayat</h2>
          <h1 class="text-sm text-center sm:text-start">Maju Bersama Dua, Perkuat Integritas MPK Kita!</h1>
        </div>

        <div class="flex flex-col flex-wrap sm:flex-row">
          <div class="flex-auto w-full text-sm ">
            <p class="font-semibold text-[#3063af] my-4 ">Visi</p>
            <p id="#visiCakeMpk2" class="text-justify">
              <!-- Injected By Javascript -->
            </p>
          </div>
          <!-- List -->
          <div id="#misiCakeMpk2" class="flex flex-col w-full text-sm ">
            <p class="font-semibold text-[#3063af] mt-4">Misi</p>
            <!-- Injected By Javascript -->
          </div>
          <!-- List -->
          <div id="#prokerCakeMpk2" class="flex flex-col w-full text-sm ">
            <p class="font-semibold text-[#3063af] mt-4">Program Kerja</p>
            <!-- Injected By Javascript -->
          </div>
        </div>
      </section>
    </div>
    <div class="block rounded-3xl bg-[#3063af] text-red-500 w-32 h-1 mx-auto my-20"></div>
  </div>

  <!-- Calon 3 -->
  <div class="max-w-5xl my-1 mx-auto w-full sm:my-16 sm:w-[1024px]">
    <div class="flex flex-col flex-wrap p-4 sm:flex-row gap-11">
      <div class="flex-auto">
        <!--  w-52 sm:w-[5%] -->
        <livewire:styles/>
        <livewire:hover-candidates :imageSrc="'/img/pemilos2023/Paslon 03 MPK formal.webp'"
                                   :imageChange="'/img/pemilos2023/Paslon 03 MPK non formal.webp'"
                                   :class="'h-auto max-w-full mx-auto w-52 sm:w-72'"/>
        <livewire:scripts/>
      </div>
      <section class="flex-auto text-slate-800 w-full sm:w-[45%]">
        <div class="mb-8 space-y-1">
          <h1 class="text-sm font-semibold text-[#3063af] text-center sm:text-start">Calon 3</h1>
          <h2 class="text-3xl font-bold text-center sm:text-start">Yusuf Ricky H.</h2>
          <h1 class="text-sm text-center sm:text-start">Kemajuan bersama, pilih nomer 3</h1>
        </div>

        <div class="flex flex-col flex-wrap sm:flex-row">
          <div class="flex-auto w-full text-sm ">
            <p class="font-semibold text-[#3063af] my-4 ">Visi</p>
            <p id="#visiCakeMpk3" class="text-justify">
              <!-- Injected By Javascript -->
            </p>
          </div>
          <!-- List -->
          <div id="#misiCakeMpk3" class="flex flex-col w-full text-sm ">
            <p class="font-semibold text-[#3063af] mt-4">Misi</p>
            <!-- Injected By Javascript -->
          </div>
          <!-- List -->
          <div id="#prokerCakeMpk3" class="flex flex-col w-full text-sm ">
            <p class="font-semibold text-[#3063af] mt-4">Program Kerja</p>
            <!-- Injected By Javascript -->
          </div>
        </div>
      </section>
    </div>
    <div class="block rounded-3xl bg-[#3063af] text-red-500 w-32 h-1 mx-auto my-20"></div>
  </div>
  <!-- #CALOND -->

  <img class="w-full h-24" src="/img/grafis_4.png" alt=""/>
</section>

<img class="w-full h-24" src="/img/grafis_5.png" alt=""/>
<section class="text-white p-14"
         style="
        background: linear-gradient(
            180deg,
            rgba(8, 56, 127, 1) 0%,
            rgba(11, 77, 175, 1) 100%
          )
          no-repeat;
      ">

  <section class="flex flex-col items-center justify-between sm:flex-row">
    <div class="flex flex-col">
      <h1 class="w-full text-4xl font-bold my-7 sm:w-96">
        Sudah siap untuk memilih pilihanmu?
      </h1>
      <h1>Jika kamu sudah memiliki pilihan, tekan tombol dibawah ini untuk
        memilih paslon.
      </h1>
      <a
        class="block w-full text-center sm:text-start sm:w-52 font-semibold rounded-full bg-[#08387f] text-white py-4 px-12 mt-12 hover:bg-[#083e90]"
        href="{{ route('vote') }}">Pilih Sekarang</a>
    </div>
    <div class="flex justify-center order-first w-full sm:w-fit sm:order-none sm:block">
      <img class="h-24" src="/img/grafis_6.svg" alt=""/>
    </div>
  </section>
</section>
@livewireScripts
</body>

</html>
