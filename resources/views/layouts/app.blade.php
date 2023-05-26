<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Tour admin</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('logo.jpg')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
	{{-- <link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome/css/fontawesome.min.css')}}"> --}}
	<link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/css/feathericon.min.css')}}">
	<link rel="stylehseet" href="{{asset('admin/https://cdn.oesmith.co.uk/morris-0.5.1.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/plugins/morris/morris.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/css/clearfix.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/css/select2.min.css')}}">
    <script src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
        
        <!-- Icons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
 </head>
<script type="module">
            import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
        </script>
        
        @livewireStyles
<body>
	<div class="main-wrapper">
		<div class="header">
		 @include('layouts.nav')
		</div>
		@include('layouts.sidebar')
		<div class="page-wrapper">
			@yield('content')
		</div>
	</div>
    @stack('modals')
       
	{{-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
	<script src="{{asset('admin/assets/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/raphael/raphael.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/morris/morris.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/chart.morris.js')}}"></script>
	<script src="{{asset('admin/assets/js/script.js')}}"></script>
	<script src="{{asset('admin/assets/js/select2.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
        @livewireScripts
        @stack('scripts')
        
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        
        @if (session()->has('success')) 
        <script>
            var notyf = new Notyf({dismissible: true})
            notyf.success('{{ session('success') }}')
        </script> 
        @endif
    <script>
           /* Simple Alpine Image Viewer */
document.addEventListener('alpine:init', () => {
    Alpine.data('imageViewer', (src = '') => {
        return {
            imageUrls: src ? [src] : [],

            refreshUrl() {
                this.imageUrls = this.$el.getAttribute('image-url');
            },

            filesChosen(event) {
                this.imageUrls = [];
                const files = event.target.files;
                for (let i = 0; i < files.length; i++) {
                    const fileReader = new FileReader();
                    fileReader.onload = (event) => {
                        this.imageUrls.push(event.target.result);
                    };
                    fileReader.readAsDataURL(files[i]);
                }
            },
        };
    });
});
</script>

<script>
    //initialize select2
    $(function () {
        $('.select2').select2({
            placeholder: 'Select a category'
        });
    });
</script>
</body>

</html>