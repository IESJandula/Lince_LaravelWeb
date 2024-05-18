<script src="https://cdn.tiny.cloud/1/ct6pz9c0yqv2jv98wbtqafkct7y0x1hla8ekbjm18oic3gyo/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ url('assets/js/tinymce/langs/es.js') }}"></script>
<script>
   tinymce.init({
     selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
     toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',     language: 'es'
   });
</script>