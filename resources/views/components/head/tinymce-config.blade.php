<script src="https://cdn.tiny.cloud/1/ct6pz9c0yqv2jv98wbtqafkct7y0x1hla8ekbjm18oic3gyo/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ url('assets/js/tinymce/langs/es.js') }}"></script>
<script>
   tinymce.init({
     selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: 'powerpaste advcode table lists checklist',
     toolbar: 'undo redo | blocks| bold italic underline | bullist numlist checklist | code | table',
     language: 'es'
   });
</script>