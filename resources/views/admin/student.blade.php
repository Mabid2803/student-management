<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body>
<x-app-layout>
    <livewire:managestudent/>
</x-app-layout>
@livewireScripts
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script>
        $(document).ready(function (){
        $(document).on('click', '.edit', function ()
        {
            $('#editStudentModal').modal('show');
        });
    });
        $(document).ready(function (){
        $(document).on('click', '.view', function ()
        {
            var id = $(this).val()
            var name = (this.getAttribute('data-name-type'))
            var father_name = (this.getAttribute('data-fatherName-type'))
            var classes = (this.getAttribute('data-class-type'))
            var email = (this.getAttribute('data-email-type'))
            var phone = (this.getAttribute('data-phone-type'))
            $('#names').val(name)
            $('#father_name').val(father_name)
            $('#classes').val(classes)
            $('#emails').val(email)
            $('#phones').val(phone)
            $('#viewStudentModal').modal('show');
        });
    });
</script>
</body>
</html>
</script>
</body>
</html>
