<style>
    button {
        background-color:rgb(121,22,15) !important;
    }
    button:hover {
        background-color:rgb(204, 98, 90) !important;
	    color:rgb(0, 0, 0) !important;
    }
</style>
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}" >
    {{ $slot }}
</button>