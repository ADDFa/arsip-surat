<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form>
        @csrf

        <input type="text" name="coba" id="coba">
        <button type="button" class="simpan">simpan</button>
        {{-- <button type="submit">simpan</button> --}}
    </form>

    <script>
        document.querySelector('.simpan').addEventListener('click', e => {
            const formData = new FormData(e.target.form)

            fetch(`${origin}/disposisi`, {
                method: 'POST',
                body: formData
            })
            .then(e => e.json())
            .then(e => console.log(e))
        })
    </script>
</body>

</html>