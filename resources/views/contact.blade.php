@include('layouts.app')

  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Contact Page</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <body>
        <!--
    This example requires some changes to your config:
    
    ```
    // tailwind.config.js
    module.exports = {
        // ...
        plugins: [
        // ...
        require('@tailwindcss/forms'),
        ],
    }
    ```
    -->
    <div class="isolate bg-white px-6 py-24 sm:py-16 lg:px-8">
    
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Contact sales</h2>
        <p class="mt-2 text-lg leading-8 text-gray-600">Aute magna irure deserunt veniam aliqua magna enim voluptate.</p>
    </div>
    <<form id="createForm" enctype="multipart/form-data">
    @csrf
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
        <div class="sm:col-span-2">
            <label for="NamaPengirim" class="block text-sm font-semibold leading-6 text-gray-900">Nama Lengkap</label>
            <div class="mt-2.5">
            <input type="text" name="NamaPengirim" id="NamaPengirim" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="sm:col-span-2">
            <label for="EmailPengirim" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
            <div class="mt-2.5">
            <input type="email" name="EmailPengirim" id="EmailPengirim" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="sm:col-span-2">
            <label for="NoTelpPengirim" class="block text-sm font-semibold leading-6 text-gray-900">NoTelp</label>
            <div class="mt-2.5">
            <input type="text" name="NoTelpPengirim" id="NoTelpPengirim" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="sm:col-span-2">
            <label for="massage" class="block text-sm font-semibold leading-6 text-gray-900">Message</label>
            <div class="mt-2.5">
            <textarea name="massage" id="massage" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
        </div>
        <div class="flex gap-x-4 sm:col-span-2">
            <div class="flex h-6 items-center">
            <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
            <button type="button" class="flex w-8 flex-none cursor-pointer rounded-full bg-gray-200 p-px ring-1 ring-inset ring-gray-900/5 transition-colors duration-200 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" role="switch" aria-checked="false" aria-labelledby="switch-1-label">
                <span class="sr-only">Agree to policies</span>
                <!-- Enabled: "translate-x-3.5", Not Enabled: "translate-x-0" -->
                <span aria-hidden="true" class="h-4 w-4 translate-x-0 transform rounded-full bg-white shadow-sm ring-1 ring-gray-900/5 transition duration-200 ease-in-out"></span>
            </button>
            </div>
            <label class="text-sm leading-6 text-gray-600" id="switch-1-label">
            By selecting this, you agree to our
            <a href="#" class="font-semibold text-indigo-600">privacy&nbsp;policy</a>.
            </label>
        </div>
        </div>
        <div class="mt-10">
        <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Let's talk</button>
        </div>
    </form>
    </div>

</body>
    </div>
  </main>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
    $('#createForm').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '{{ route("contacts.store") }}',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                alert(response.message);
                window.location.href = '/contacts';
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
                alert('An error occurred while adding the item. Please try again.');
                window.location.href = '/contacts/create';
            }
        });
    });
});
    </script>

@extends('layouts.foot')
</body>
</html>


</body>
</html>
