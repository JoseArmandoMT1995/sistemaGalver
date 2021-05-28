<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>
<script>
    function fechaActual() {
        var dt = new Date();
        return (
            `${dt.getFullYear().toString().padStart(4, '0')}:${(
            dt.getMonth()+1).toString().padStart(2, '0')}:${
            dt.getDate().toString().padStart(2, '0')} ${
            dt.getHours().toString().padStart(2, '0')}:${
            dt.getMinutes().toString().padStart(2, '0')}:${
            dt.getSeconds().toString().padStart(2, '0')}`
        );
    }

    console.log(fechaActual());
</script>