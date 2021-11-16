<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <h1>Danh sách sinh viên</h1>
    <form action="processForm.php" method="post" name="student-form">
        <input class="w3-input w3-padding-16" type="text" name="full_name" placeholder="Your name..">

        <input class="w3-input w3-padding-16" type="text" name="email" placeholder="Your email..">

        <input class="w3-input w3-padding-16" type="date" name="birthday" placeholder="Your birthday..">


        <select class="w3-input w3-padding-16" name="gender">
            <option value="1">nam</option>
            <option value="0">nu</option>
        </select>

        <input class="w3-input w3-padding-16" type="text" name="address" placeholder="Your address..">

        <input style="margin-top: 10px" type="submit" value="Submit">
    </form>
    <span id="reload" style="font-size: 14px; text-decoration: underline; color: cornflowerblue; cursor: pointer">refesh</span>

    <div id="content"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            const inputFull_name = $('input[name=full_name]');
            const inputEmail = $('input[name=email]');
            const inputBirthday = $('input[name=birthday]');
            const inputAddress = $('input[name=address]');
            const selectGender = $('select[name=gender]');
            $('form[name=student-form]').submit(function (event) {
                event.preventDefault(); // đảm bảo dữ liệu sẽ gửi đi nhưng sẽ không chạy đến đường dẫn, tức là ở nguyên tại chỗ
                let data = {
                    full_name: inputFull_name.val(),
                    email: inputEmail.val(),
                    gender: selectGender.val(),
                    birthday: inputBirthday.val(),
                    address: inputAddress.val(),
                };

                $.ajax({
                    url:'http://localhost:5000/studentManager/student/processForm.php',
                    method: 'POST',
                    data: JSON.stringify(data),
                    success : function (responseData) {
                        console.log('responseData: ',responseData.message);
                        loadData();
                    },
                    error:function () {
                        console.log('something error');
                    }
                });
            });
            function loadData() {
                $.ajax({
                    url:'http://localhost:5000/studentManager/student/listJSON.php',
                    method: 'get',
                    success: function (data) {
                        var contentHTML = '<ul>';
                        data.forEach(element => {
                            contentHTML += `<li>${element.full_name}</li>`;
                            console.log(element.full_name);
                        })
                        contentHTML += '</ul>';
                        $('#content').html(contentHTML);
                        // console.log(data);
                    },
                    error:function () {
                        console.log('something error');
                    }
                });
            }
            loadData();
            $('#reload').click(loadData);
        });
    </script>
</body>
</html>